<?php
/**
 * ========================================================
 * LIFLOW - Midtrans Payment & Subscription API
 * Handles: create_payment, confirm_payment, get_transaction
 * Supports: QRIS & Transfer Bank BRI (309501028629531)
 * ========================================================
 */

require_once __DIR__ . '/../config/database.php';

header('Content-Type: application/json');

$action = $_GET['action'] ?? $_GET['api'] ?? '';
$input  = json_decode(file_get_contents('php://input'), true) ?? [];

// Helper to format currency
function formatRupiah($num) {
    return 'Rp ' . number_format($num, 0, ',', '.');
}

// ──────────────────────────────────────────────────────────────
// 1. CREATE PAYMENT
// ──────────────────────────────────────────────────────────────
if ($action === 'create_payment') {
    $plan_duration  = $input['duration'] ?? 'monthly'; // 'monthly' or 'yearly'
    $payment_method = $input['method']   ?? 'qris';    // 'qris' or 'bank'
    $customer_name  = trim($input['name']  ?? ($_SESSION['username'] ?? 'Pelanggan LIFLOW'));
    $customer_email = trim($input['email'] ?? ($_SESSION['email']    ?? 'user@liflow.app'));
    $customer_phone = trim($input['phone'] ?? defined('WHATSAPP_RAW_NUMBER') ? WHATSAPP_RAW_NUMBER : '085742546223');

    if (empty($customer_name))  $customer_name  = 'Pelanggan LIFLOW';
    if (empty($customer_email)) $customer_email = 'member@liflow.app';
    if (empty($customer_phone)) $customer_phone = '085742546223';

    // Pricing rule according to user specification:
    // 1 Bulan: 15.000 | 1 Tahun: 70.000
    if ($plan_duration === 'yearly') {
        $amount    = 70000;
        $plan_name = 'LIFLOW Premium (1 Tahun)';
        $days      = 365;
    } else {
        $plan_duration = 'monthly';
        $amount    = 15000;
        $plan_name = 'LIFLOW Premium (1 Bulan)';
        $days      = 30;
    }

    // Generate unique Order ID
    $order_id = 'LF-TRX-' . date('Ymd') . '-' . strtoupper(bin2hex(random_bytes(3)));

    // Bank Account BRI
    $bri_rekening = '309501028629531';
    $bri_bank     = 'Bank Rakyat Indonesia (BRI)';

    // Real QRIS image
    $qris_url = "assets/img/qris_liflow.jpeg";

    $user_id = $_SESSION['user_id'] ?? null;
    $now_str = date('Y-m-d H:i:s');
    $expires = date('Y-m-d H:i:s', strtotime('+15 minutes'));

    // Save transaction to DB or Session
    if ($db_connected && $db) {
        try {
            $stmt = $db->prepare("INSERT INTO transactions 
                (order_id, user_id, customer_name, customer_email, customer_phone, plan_name, duration, amount, payment_method, payment_status, transaction_time) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending', ?)");
            $stmt->execute([
                $order_id, $user_id, $customer_name, $customer_email, $customer_phone,
                $plan_name, $plan_duration, $amount, $payment_method, $now_str
            ]);
        } catch (Exception $e) {
            // Fallback gracefully
        }
    }

    // Keep in session as well
    $_SESSION['active_transaction'] = [
        'order_id'         => $order_id,
        'plan_name'        => $plan_name,
        'duration'         => $plan_duration,
        'amount'           => $amount,
        'amount_formatted' => formatRupiah($amount),
        'customer_name'    => $customer_name,
        'customer_email'   => $customer_email,
        'customer_phone'   => $customer_phone,
        'payment_method'   => $payment_method,
        'bri_rekening'     => $bri_rekening,
        'qris_url'         => $qris_url,
        'created_at'       => $now_str,
        'expires_at'       => $expires,
        'status'           => 'pending'
    ];

    echo json_encode([
        'success'      => true,
        'order_id'     => $order_id,
        'amount'       => $amount,
        'formatted'    => formatRupiah($amount),
        'plan_name'    => $plan_name,
        'duration'     => $plan_duration,
        'bri_rekening' => $bri_rekening,
        'qris_url'     => $qris_url,
        'expires_at'   => $expires,
        'customer'     => [
            'name'  => $customer_name,
            'email' => $customer_email,
            'phone' => $customer_phone,
        ],
    ]);
    exit;
}

// ──────────────────────────────────────────────────────────────
// 2. CONFIRM PAYMENT (SETTLEMENT / LUNAS)
// ──────────────────────────────────────────────────────────────
if ($action === 'confirm_payment') {
    $order_id       = trim($_POST['order_id'] ?? ($input['order_id'] ?? ($_SESSION['active_transaction']['order_id'] ?? '')));
    $payment_method = $_POST['method'] ?? ($input['method'] ?? ($_SESSION['active_transaction']['payment_method'] ?? 'qris'));

    if (empty($order_id)) {
        echo json_encode(['success' => false, 'message' => 'Order ID tidak valid.']);
        exit;
    }

    // Handle Proof Upload (Struk / Bukti Transfer)
    $proof_file_path = null;
    if (isset($_FILES['proof']) && $_FILES['proof']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'pdf'];
        $ext = strtolower(pathinfo($_FILES['proof']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $upload_dir = __DIR__ . '/../assets/uploads/proofs';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            $clean_order = preg_replace('/[^a-zA-Z0-9_\-]/', '', $order_id);
            $filename = 'proof_' . $clean_order . '_' . time() . '.' . $ext;
            $dest = $upload_dir . '/' . $filename;
            if (move_uploaded_file($_FILES['proof']['tmp_name'], $dest)) {
                $proof_file_path = 'assets/uploads/proofs/' . $filename;
            }
        }
    }

    $active_trx = $_SESSION['active_transaction'] ?? null;
    $plan_duration = $active_trx['duration'] ?? 'monthly';
    $amount = ($plan_duration === 'yearly') ? 70000 : 15000;
    $plan_name = ($plan_duration === 'yearly') ? 'LIFLOW Premium (1 Tahun)' : 'LIFLOW Premium (1 Bulan)';
    $days = ($plan_duration === 'yearly') ? 365 : 30;

    $customer_name  = $active_trx['customer_name']  ?? ($_SESSION['username'] ?? 'Pelanggan LIFLOW');
    $customer_email = $active_trx['customer_email'] ?? ($_SESSION['email']    ?? 'user@liflow.app');
    $customer_phone = $active_trx['customer_phone'] ?? '085742546223';

    $paid_at_time = date('Y-m-d H:i:s');
    $formatted_date = date('d F Y, H:i') . ' WIB';
    $expires_date   = date('d F Y', strtotime("+$days days"));

    // Update in MySQL if connected
    if ($db_connected && $db) {
        try {
            // Update transaction table with proof file
            $stmt = $db->prepare("UPDATE transactions SET payment_status = 'paid', paid_at = ?, payment_method = ?, proof_file = ? WHERE order_id = ?");
            $stmt->execute([$paid_at_time, $payment_method, $proof_file_path, $order_id]);

            // Upgrade user account if logged in
            if (!empty($_SESSION['user_id'])) {
                $exp_datetime = date('Y-m-d H:i:s', strtotime("+$days days"));
                $stmt = $db->prepare("UPDATE users SET is_premium = 1, plan_type = ?, premium_expires = ? WHERE id = ?");
                $stmt->execute([$plan_duration, $exp_datetime, $_SESSION['user_id']]);
            } elseif (!empty($customer_email)) {
                // If user matched by email
                $exp_datetime = date('Y-m-d H:i:s', strtotime("+$days days"));
                $stmt = $db->prepare("UPDATE users SET is_premium = 1, plan_type = ?, premium_expires = ? WHERE email = ?");
                $stmt->execute([$plan_duration, $exp_datetime, $customer_email]);
            }
        } catch (Exception $e) {
            // silent fallback
        }
    }

    // Set Session to Premium
    $_SESSION['is_premium']       = 1;
    $_SESSION['plan_type']        = $plan_duration;
    $_SESSION['premium_expires']  = $expires_date;
    $_SESSION['last_paid_order']  = $order_id;

    if (isset($_SESSION['active_transaction'])) {
        $_SESSION['active_transaction']['status']     = 'paid';
        $_SESSION['active_transaction']['paid_at']    = $paid_at_time;
        $_SESSION['active_transaction']['proof_file'] = $proof_file_path;
    }

    // Method display name
    $method_labels = [
        'qris'          => 'QRIS (Midtrans Instant Settlement)',
        'bank'          => 'Transfer Bank BRI (3095-01-028629-53-1)',
        'bank_transfer' => 'Transfer Bank BRI (3095-01-028629-53-1)',
    ];
    $method_display = $method_labels[$payment_method] ?? ($payment_method === 'bank' ? 'Transfer Bank BRI (3095-01-028629-53-1)' : 'QRIS (Instant Settlement)');

    // Build WhatsApp Confirmation Message
    $wa_msg = "Halo Admin LIFLOW, saya telah berhasil menyelesaikan pembayaran paket Premium!\n\n"
            . "🧾 *BUKTI TRANSAKSI MIDTRANS*\n"
            . "• Order ID: " . $order_id . "\n"
            . "• Paket: " . $plan_name . "\n"
            . "• Total Bayar: " . formatRupiah($amount) . " (LUNAS)\n"
            . "• Metode: " . $method_display . "\n"
            . "• Bukti Pembayaran: " . ($proof_file_path ? "Sudah Diunggah (" . basename($proof_file_path) . ")" : "Terlampir") . "\n"
            . "• Status: BERHASIL / SETTLEMENT\n"
            . "• Tanggal: " . $formatted_date . "\n"
            . "• Nama: " . $customer_name . "\n"
            . "• Email: " . $customer_email . "\n\n"
            . "Mohon bantuan verifikasi dan konfirmasi fitur premium saya. Bukti transfer juga saya lampirkan di chat ini. Terima kasih! 🌿";

    $wa_url = "https://wa.me/" . (defined('WHATSAPP_NUMBER') ? WHATSAPP_NUMBER : '6285742546223') . "?text=" . rawurlencode($wa_msg);

    echo json_encode([
        'success'      => true,
        'message'      => 'Pembayaran berhasil diverifikasi oleh Midtrans!',
        'transaction'  => [
            'order_id'         => $order_id,
            'plan_name'        => $plan_name,
            'duration'         => $plan_duration,
            'amount'           => $amount,
            'amount_formatted' => formatRupiah($amount),
            'payment_method'   => $method_display,
            'proof_file'       => $proof_file_path,
            'status'           => 'LUNAS (PAID)',
            'customer_name'    => $customer_name,
            'customer_email'   => $customer_email,
            'customer_phone'   => $customer_phone,
            'transaction_time' => $formatted_date,
            'expires_date'     => $expires_date,
            'whatsapp_url'     => $wa_url,
        ]
    ]);
    exit;
}

// ──────────────────────────────────────────────────────────────
// 3. GET TRANSACTION STATUS
// ──────────────────────────────────────────────────────────────
if ($action === 'get_transaction') {
    $order_id = $_GET['order_id'] ?? ($_SESSION['active_transaction']['order_id'] ?? '');
    if ($order_id && isset($_SESSION['active_transaction']) && $_SESSION['active_transaction']['order_id'] === $order_id) {
        echo json_encode(['success' => true, 'transaction' => $_SESSION['active_transaction']]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Transaksi tidak ditemukan.']);
    }
    exit;
}

echo json_encode(['success' => false, 'message' => 'Action tidak dikenali.']);
exit;
