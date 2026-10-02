<?php
/**
 * ========================================================
 * LIFLOW - Authentication API
 * Handles: register, login, logout
 * Supports: MySQL storage with automatic Session fallback
 * ========================================================
 */

require_once __DIR__ . '/../config/database.php';

header('Content-Type: application/json');

$action = $_GET['action'] ?? $_GET['api'] ?? '';

// Default initial state
function getDefaultState() {
    return [
        'tasks' => [
            ['id' => 1, 'text' => 'Selesaikan Desain UI Liflow', 'category' => 'Productivity', 'priority' => 'High',   'completed' => true],
            ['id' => 2, 'text' => 'Meeting Organisasi',          'category' => 'Productivity', 'priority' => 'Medium', 'completed' => false],
            ['id' => 3, 'text' => 'Olahraga 30 menit',           'category' => 'Health',        'priority' => 'Medium', 'completed' => false],
        ],
        'habits' => [
            ['id' => 1, 'name' => 'Minum air 8 gelas',    'streak' => 7],
            ['id' => 2, 'name' => 'Olahraga 30 menit',    'streak' => 5],
            ['id' => 3, 'name' => 'Baca buku 15 menit',   'streak' => 3],
            ['id' => 4, 'name' => 'Tidur sebelum 23.00',  'streak' => 6],
        ],
        'transactions' => [
            ['id' => 1, 'name' => 'Makan Siang',  'amount' => 25000, 'type' => 'expense'],
            ['id' => 2, 'name' => 'Transportasi', 'amount' => 15000, 'type' => 'expense'],
            ['id' => 3, 'name' => 'Freelance',    'amount' => 350000, 'type' => 'income'],
            ['id' => 4, 'name' => 'Kopi',         'amount' => 18000, 'type' => 'expense'],
        ],
        'currentRefMood' => '🙂',
        'lifeScore'      => 86,
    ];
}

// ──────────────────────────────────────────────────────────────
// REGISTER
// ──────────────────────────────────────────────────────────────
if ($action === 'register') {
    $input    = json_decode(file_get_contents('php://input'), true);
    $username = trim($input['username'] ?? '');
    $email    = trim($input['email']    ?? '');
    $password = $input['password']      ?? '';

    if (empty($username) || empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Harap isi semua kolom pendaftaran.']);
        exit;
    }

    $initial_state = getDefaultState();

    if ($db_connected && $db) {
        try {
            $stmt = $db->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
            $stmt->execute([$email, $username]);
            if ($stmt->fetch()) {
                echo json_encode(['success' => false, 'message' => 'Username atau Email sudah terdaftar.']);
                exit;
            }

            $hashed = password_hash($password, PASSWORD_BCRYPT);
            $stmt   = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashed]);
            $user_id = $db->lastInsertId();

            $stmt = $db->prepare("INSERT INTO user_data (user_id, state_json) VALUES (?, ?)");
            $stmt->execute([$user_id, json_encode($initial_state)]);

            $_SESSION['user_id']  = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email']    = $email;

            echo json_encode([
                'success' => true,
                'user'    => ['username' => $username, 'email' => $email],
                'state'   => $initial_state,
            ]);
            exit;
        } catch (Exception $e) {
            // DB error fallback to session
        }
    }

    // Session fallback if DB offline
    $_SESSION['user_id']    = 1;
    $_SESSION['username']   = $username;
    $_SESSION['email']      = $email;
    $_SESSION['user_state'] = $initial_state;

    echo json_encode([
        'success' => true,
        'user'    => ['username' => $username, 'email' => $email],
        'state'   => $initial_state,
    ]);
    exit;
}

// ──────────────────────────────────────────────────────────────
// LOGIN
// ──────────────────────────────────────────────────────────────
if ($action === 'login') {
    $input    = json_decode(file_get_contents('php://input'), true);
    $email    = trim($input['email']    ?? '');
    $password = $input['password']      ?? '';

    if (empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Harap masukkan email dan kata sandi.']);
        exit;
    }

    if ($db_connected && $db) {
        try {
            $stmt = $db->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
            $stmt->execute([$email, $email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $stmt = $db->prepare("SELECT state_json FROM user_data WHERE user_id = ?");
                $stmt->execute([$user['id']]);
                $data  = $stmt->fetch();
                $state = $data ? json_decode($data['state_json'], true) : getDefaultState();

                $_SESSION['user_id']  = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email']    = $user['email'];

                echo json_encode([
                    'success' => true,
                    'user'    => ['username' => $user['username'], 'email' => $user['email']],
                    'state'   => $state,
                ]);
                exit;
            } else {
                echo json_encode(['success' => false, 'message' => 'Kredensial login Anda salah.']);
                exit;
            }
        } catch (Exception $e) {
            // Fallthrough to session fallback
        }
    }

    // Session fallback if DB is not configured
    $username = explode('@', $email)[0];
    if (empty($username)) $username = 'Zafira';
    
    $_SESSION['user_id']    = 1;
    $_SESSION['username']   = ucfirst($username);
    $_SESSION['email']      = $email;
    $state = $_SESSION['user_state'] ?? getDefaultState();

    echo json_encode([
        'success' => true,
        'user'    => ['username' => $_SESSION['username'], 'email' => $email],
        'state'   => $state,
    ]);
    exit;
}

// ──────────────────────────────────────────────────────────────
// LOGOUT
// ──────────────────────────────────────────────────────────────
if ($action === 'logout') {
    $_SESSION = [];
    if (session_id()) {
        session_destroy();
    }
    echo json_encode(['success' => true]);
    exit;
}

echo json_encode(['success' => false, 'message' => 'Action tidak dikenal.']);
