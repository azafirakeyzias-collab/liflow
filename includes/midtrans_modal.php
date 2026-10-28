<?php
/**
 * ========================================================
 * LIFLOW - Midtrans Payment Modal & Transaction Proof
 * Support: QRIS & Transfer Bank BRI (309501028629531)
 * Official WhatsApp Contact: 0857-4254-6223
 * ========================================================
 */
$wa_contact = defined('WHATSAPP_NUMBER') ? WHATSAPP_NUMBER : '6285742546223';
$wa_display = defined('WHATSAPP_DISPLAY') ? WHATSAPP_DISPLAY : '0857-4254-6223';
$current_username = htmlspecialchars($_SESSION['username'] ?? '');
$current_email    = htmlspecialchars($_SESSION['email'] ?? '');
?>

<!-- ══ MIDTRANS PAYMENT & RECEIPT MODAL ═════════════════════ -->
<div id="midtrans-modal" class="fixed inset-0 bg-stone-950/60 backdrop-blur-sm z-[150] hidden flex items-center justify-center p-3 sm:p-4 overflow-y-auto">
  <div class="bg-white max-w-xl w-full rounded-[32px] overflow-hidden border border-stone-100 shadow-2xl relative my-auto transition-all transform duration-300">

    <!-- ── VIEW 1: CHECKOUT & PAYMENT SELECTION ── -->
    <div id="mt-view-checkout" class="p-6 sm:p-8 space-y-6">
      
      <!-- Top Header -->
      <div class="flex items-center justify-between pb-4 border-b border-stone-100">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-2xl bg-sky-500/10 border border-sky-500/20 text-sky-600 flex items-center justify-center font-bold text-lg">
            <i class="fa-solid fa-shield-halved"></i>
          </div>
          <div>
            <div class="flex items-center gap-2">
              <h3 class="font-bold text-stone-900 text-base">Aktifkan LIFLOW Premium</h3>
              <span class="text-[9px] font-extrabold uppercase px-2 py-0.5 rounded-full bg-blue-50 text-blue-700 border border-blue-200">Midtrans Verified</span>
            </div>
            <p class="text-[11px] text-stone-400">Pembayaran instan, aman, dan langsung terverifikasi.</p>
          </div>
        </div>
        <button type="button" onclick="closeMidtransModal()" class="w-8 h-8 rounded-full bg-stone-100 hover:bg-stone-200 text-stone-500 flex items-center justify-center transition">
          <i class="fa-solid fa-xmark text-xs"></i>
        </button>
      </div>

      <!-- 1. Pilihan Durasi Paket (1 Bulan / 1 Tahun) -->
      <div class="space-y-2">
        <label class="text-[10px] font-bold text-stone-400 uppercase tracking-wider block">Pilih Durasi Berlangganan:</label>
        <div class="grid grid-cols-2 gap-3">
          <!-- 1 Bulan: 15000 -->
          <div onclick="selectPaymentDuration('monthly')" id="opt-duration-monthly" class="cursor-pointer border-2 border-liflowGreen bg-emerald-50/40 p-4 rounded-2xl relative transition hover:border-liflowGreen">
            <span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest block">1 Bulan</span>
            <div class="mt-1 flex items-baseline gap-1">
              <span class="text-xl sm:text-2xl font-extrabold text-stone-900">IDR 15.000</span>
            </div>
            <span class="text-[10px] text-stone-500 block mt-1 font-light">Fleksibel bayar bulanan</span>
          </div>
          
          <!-- 1 Tahun: 70000 -->
          <div onclick="selectPaymentDuration('yearly')" id="opt-duration-yearly" class="cursor-pointer border-2 border-stone-200 bg-white p-4 rounded-2xl relative transition hover:border-liflowGreen">
            <span class="absolute -top-2.5 right-3 text-[9px] font-black uppercase tracking-wider bg-amber-400 text-stone-900 px-2 py-0.5 rounded-full shadow-xs">Hemat 61%!</span>
            <span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest block">1 Tahun (365 Hari)</span>
            <div class="mt-1 flex items-baseline gap-1">
              <span class="text-xl sm:text-2xl font-extrabold text-stone-900">IDR 70.000</span>
            </div>
            <span class="text-[10px] text-emerald-600 block mt-1 font-semibold">Hanya ~Rp 5.800 / bulan</span>
          </div>
        </div>
      </div>

      <!-- 2. Data Pelanggan -->
      <div class="space-y-2">
        <label class="text-[10px] font-bold text-stone-400 uppercase tracking-wider block">Data Pelanggan (Untuk Bukti Transaksi):</label>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
          <input type="text" id="mt-customer-name" placeholder="Nama Lengkap" value="<?= $current_username ?>" class="bg-stone-50 border border-stone-200 rounded-xl px-3.5 py-2.5 text-xs text-stone-800 outline-none focus:ring-1 focus:ring-liflowGreen">
          <input type="email" id="mt-customer-email" placeholder="Email Akun" value="<?= $current_email ?>" class="bg-stone-50 border border-stone-200 rounded-xl px-3.5 py-2.5 text-xs text-stone-800 outline-none focus:ring-1 focus:ring-liflowGreen">
        </div>
      </div>

      <!-- 3. Metode Pembayaran Midtrans -->
      <div class="space-y-3">
        <div class="flex items-center justify-between">
          <label class="text-[10px] font-bold text-stone-400 uppercase tracking-wider block">Metode Pembayaran (Midtrans):</label>
          <span class="text-[10px] text-stone-400 font-light flex items-center gap-1">
            <i class="fa-solid fa-lock text-[9px] text-emerald-600"></i> 256-bit Encrypted
          </span>
        </div>

        <!-- Payment Tabs: QRIS & Transfer Bank BRI -->
        <div class="grid grid-cols-2 gap-3 text-center text-xs font-bold">
          <button type="button" onclick="switchPaymentMethodTab('qris')" id="pm-tab-qris" class="py-3 px-3 rounded-2xl border-2 border-liflowGreen bg-emerald-50 text-emerald-800 transition flex flex-col items-center justify-center gap-1 shadow-xs">
            <i class="fa-solid fa-qrcode text-lg"></i>
            <span class="text-xs">QRIS (Instan)</span>
          </button>
          <button type="button" onclick="switchPaymentMethodTab('bank')" id="pm-tab-bank" class="py-3 px-3 rounded-2xl border-2 border-stone-200 bg-white text-stone-600 hover:bg-stone-50 transition flex flex-col items-center justify-center gap-1">
            <i class="fa-solid fa-building-columns text-lg"></i>
            <span class="text-xs">Transfer Bank BRI</span>
          </button>
        </div>

        <!-- Method Detail: QRIS -->
        <div id="pm-detail-qris" class="bg-stone-50 border border-stone-200/80 p-4 rounded-2xl text-center space-y-3">
          <div class="flex justify-between items-center text-[10px] text-stone-500">
            <span class="font-bold uppercase tracking-wider">National QRIS Indonesia</span>
            <span class="text-emerald-700 bg-emerald-100/70 px-2 py-0.5 rounded-full font-bold">● Scan &amp; Go</span>
          </div>
          <div class="bg-white p-3 rounded-2xl shadow-xs inline-block mx-auto border border-stone-100">
            <img id="mt-qris-image" src="assets/img/qris_liflow.jpeg" alt="QRIS LIFLOW" class="w-52 h-52 object-contain mx-auto rounded-xl">
          </div>
          <div class="space-y-1">
            <p class="text-xs font-bold text-stone-800">Scan melalui GoPay, OVO, Dana, ShopeePay, BCA, Livin, BRImo, dll.</p>
            <p class="text-[10px] text-stone-400 font-light">Nominal pas: <strong id="mt-qris-nominal" class="text-stone-900 font-bold">IDR 15.000</strong> (Tanpa biaya admin)</p>
          </div>
        </div>

        <!-- Method Detail: Transfer Bank BRI -->
        <div id="pm-detail-bank" class="bg-stone-50 border border-stone-200/80 p-4 rounded-2xl space-y-3 hidden">
          <div class="flex items-center justify-between">
            <span class="text-[10px] font-bold text-stone-400 uppercase tracking-wider block">Transfer Bank Langsung:</span>
            <span class="text-blue-700 bg-blue-100/80 text-[10px] px-2.5 py-0.5 rounded-full font-bold flex items-center gap-1">
              <i class="fa-solid fa-building-columns text-[9px]"></i> Bank BRI
            </span>
          </div>
          <div class="bg-white p-4 rounded-xl border border-stone-200 space-y-2.5 text-xs">
            <div class="flex justify-between items-center pb-2 border-b border-stone-100">
              <span class="text-stone-500">Bank Tujuan:</span>
              <span class="font-bold text-stone-900">BRI (Bank Rakyat Indonesia)</span>
            </div>
            <div class="flex justify-between items-center pb-2 border-b border-stone-100">
              <span class="text-stone-500">No. Rekening:</span>
              <div class="flex items-center gap-2">
                <span id="bri-rekening-display" class="font-mono font-extrabold text-sm sm:text-base text-stone-900 tracking-wider">309501028629531</span>
                <button type="button" onclick="copyBriRekening()" class="px-2.5 py-1 bg-stone-100 hover:bg-stone-200 text-stone-700 text-[11px] font-bold rounded-lg transition flex items-center gap-1">
                  <i class="fa-regular fa-copy text-xs"></i> <span>Salin</span>
                </button>
              </div>
            </div>
            <div class="flex justify-between items-center">
              <span class="text-stone-500">Atas Nama:</span>
              <span class="font-bold text-stone-900">LIFLOW LIFE OS</span>
            </div>
          </div>
          <p class="text-[10px] text-stone-400 font-light leading-relaxed">
            Silakan transfer sesuai nominal tagihan melalui BRImo, ATM BRI, atau transfer antar bank.
          </p>
        </div>

      </div>

      <!-- 4. Upload Bukti Pembayaran (Wajib sebelum Confirm) -->
      <div class="space-y-2 pt-1" id="upload-proof-container">
        <div class="flex items-center justify-between">
          <label class="text-[10px] font-bold text-stone-400 uppercase tracking-wider block">
            Unggah Bukti Pembayaran: <span class="text-rose-500 font-bold">*Wajib</span>
          </label>
          <span class="text-[10px] text-stone-400 font-light">JPG, PNG, PDF (Maks. 5MB)</span>
        </div>

        <input type="file" id="mt-payment-proof" accept="image/*,application/pdf" class="hidden" onchange="handleProofFileSelected(event)">

        <!-- Upload Dropzone / Box -->
        <div id="proof-dropzone" onclick="document.getElementById('mt-payment-proof').click()" class="cursor-pointer border-2 border-dashed border-stone-200 hover:border-liflowGreen bg-stone-50 hover:bg-emerald-50/20 p-4 rounded-2xl text-center transition group">
          
          <!-- Empty State -->
          <div id="proof-empty-state" class="space-y-1.5 py-1">
            <div class="w-10 h-10 rounded-full bg-stone-100 group-hover:bg-emerald-100 text-stone-400 group-hover:text-emerald-700 flex items-center justify-center mx-auto transition">
              <i class="fa-solid fa-cloud-arrow-up text-base"></i>
            </div>
            <p class="text-xs font-bold text-stone-700">Pilih atau Drag &amp; Drop Bukti Transfer / QRIS</p>
            <p class="text-[10px] text-stone-400 font-light">Klik di sini untuk upload foto struk transfer pembayaran Anda</p>
          </div>

          <!-- Preview State (Initially Hidden) -->
          <div id="proof-preview-state" class="hidden items-center justify-between gap-3 text-left">
            <div class="flex items-center gap-3 overflow-hidden">
              <div class="w-12 h-12 rounded-xl bg-stone-200 overflow-hidden shrink-0 border border-stone-200 flex items-center justify-center">
                <img id="proof-preview-img" src="" alt="Bukti" class="w-full h-full object-cover hidden">
                <i id="proof-preview-pdf" class="fa-solid fa-file-pdf text-rose-500 text-xl hidden"></i>
              </div>
              <div class="overflow-hidden">
                <span id="proof-file-name" class="font-bold text-stone-800 text-xs truncate block">struk_transfer.jpg</span>
                <span id="proof-file-size" class="text-[10px] text-stone-400 block font-mono">1.2 MB • Siap diunggah</span>
              </div>
            </div>
            <button type="button" onclick="event.stopPropagation(); removeSelectedProof();" class="px-2.5 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-600 rounded-lg text-[10px] font-bold transition shrink-0 flex items-center gap-1">
              <i class="fa-solid fa-trash-can"></i> <span>Ganti</span>
            </button>
          </div>

        </div>

        <p id="proof-validation-msg" class="text-[10px] text-rose-500 font-medium hidden flex items-center gap-1">
          <i class="fa-solid fa-circle-exclamation"></i> Silakan upload bukti transfer atau screenshot QRIS Anda terlebih dahulu!
        </p>
      </div>

      <!-- Action Button: Bayar & Verifikasi -->
      <div class="pt-2 space-y-2">
        <button type="button" onclick="executeMidtransPayment()" id="btn-process-payment" class="w-full bg-[#25D366] hover:bg-[#20BD5A] text-white py-3.5 px-6 rounded-2xl font-bold text-xs uppercase tracking-widest transition shadow-lg flex items-center justify-center gap-2">
          <i class="fa-solid fa-circle-check text-sm"></i>
          <span>Konfirmasi &amp; Verifikasi Pembayaran</span>
        </button>
        <p class="text-[10px] text-stone-400 text-center font-light flex items-center justify-center gap-1">
          <i class="fa-solid fa-bolt text-amber-500"></i> Verifikasi real-time seketika tanpa jeda waktu.
        </p>
      </div>

    </div>

    <!-- ── VIEW 2: BUKTI TRANSAKSI RESMI (INVOICE & E-RECEIPT) ── -->
    <div id="mt-view-receipt" class="p-6 sm:p-8 space-y-6 hidden">
      
      <!-- Success Banner -->
      <div class="text-center space-y-2">
        <div class="w-14 h-14 rounded-full bg-emerald-100 text-[#25D366] border-2 border-emerald-200 flex items-center justify-center text-3xl mx-auto shadow-sm animate-bounce">
          <i class="fa-solid fa-check"></i>
        </div>
        <h3 class="font-serif font-bold text-stone-900 text-2xl">Pembayaran Berhasil!</h3>
        <p class="text-xs text-stone-500 font-light">Transaksi Anda telah terverifikasi resmi oleh sistem Midtrans.</p>
        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 text-[10px] font-black uppercase tracking-wider border border-emerald-200">
          <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Status: LUNAS (SETTLEMENT)
        </div>
      </div>

      <!-- Receipt Voucher Card -->
      <div id="printable-receipt" class="bg-stone-50 border border-stone-200 p-5 rounded-2xl space-y-3 text-xs relative">
        <div class="flex justify-between items-start pb-3 border-b border-stone-200/80">
          <div>
            <span class="font-bold text-stone-900 block text-sm">LIFLOW LIFE OS</span>
            <span class="text-[10px] text-stone-400">Bukti Transaksi Resmi • Midtrans Gateway</span>
          </div>
          <span class="font-mono text-[10px] font-bold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-md" id="rcpt-order-id">LF-TRX-20261023-001</span>
        </div>

        <div class="space-y-1.5 text-stone-700 pt-1">
          <div class="flex justify-between">
            <span class="text-stone-400 font-light">Tanggal Transaksi:</span>
            <span class="font-medium" id="rcpt-date">23 Oktober 2026</span>
          </div>
          <div class="flex justify-between">
            <span class="text-stone-400 font-light">Nama Pelanggan:</span>
            <span class="font-bold text-stone-900" id="rcpt-name">Pelanggan LIFLOW</span>
          </div>
          <div class="flex justify-between">
            <span class="text-stone-400 font-light">Email:</span>
            <span class="font-medium" id="rcpt-email">user@liflow.app</span>
          </div>
          <div class="flex justify-between">
            <span class="text-stone-400 font-light">Paket Layanan:</span>
            <span class="font-bold text-emerald-700" id="rcpt-plan">LIFLOW Premium (1 Bulan)</span>
          </div>
          <div class="flex justify-between">
            <span class="text-stone-400 font-light">Metode Bayar:</span>
            <span class="font-medium" id="rcpt-method">QRIS (Midtrans Instant)</span>
          </div>
          <div class="flex justify-between">
            <span class="text-stone-400 font-light">Masa Aktif Fitur:</span>
            <span class="font-bold text-stone-900" id="rcpt-expires">Aktif s/d 23 November 2026</span>
          </div>
          <div class="flex justify-between items-center" id="rcpt-proof-row">
            <span class="text-stone-400 font-light">Bukti Pembayaran:</span>
            <span class="font-medium text-emerald-700 flex items-center gap-1.5" id="rcpt-proof-status">
              <i class="fa-solid fa-paperclip text-[10px]"></i>
              <a id="rcpt-proof-link" href="#" target="_blank" class="underline hover:text-emerald-800 font-semibold">Lihat Bukti Terlampir</a>
            </span>
          </div>
        </div>

        <div class="pt-3 border-t border-dashed border-stone-300 flex justify-between items-baseline">
          <span class="font-bold text-stone-900 uppercase tracking-wider text-[11px]">Total Lunas</span>
          <span class="font-extrabold text-xl text-stone-900" id="rcpt-amount">IDR 15.000</span>
        </div>
      </div>

      <!-- Action Buttons Requested: Akses Fitur Premium, Cetak Bukti, & Chat WhatsApp -->
      <div class="space-y-2.5 pt-2">
        
        <!-- 1. Akses Fitur Premium Langsung -->
        <button type="button" onclick="goToPremiumDashboard()" class="w-full bg-liflowGreen hover:bg-stone-700 text-white py-3.5 px-6 rounded-2xl font-bold text-xs uppercase tracking-widest transition shadow-lg flex items-center justify-center gap-2">
          <i class="fa-solid fa-crown text-amber-300"></i>
          <span>Akses Fitur Premium Sekarang</span>
        </button>

        <div class="grid grid-cols-2 gap-2">
          <!-- 2. Cetak Bukti Transaksi -->
          <button type="button" onclick="printTransactionReceipt()" class="w-full bg-white hover:bg-stone-50 border border-stone-200 text-stone-700 py-3 px-3 rounded-xl font-bold text-xs transition flex items-center justify-center gap-1.5">
            <i class="fa-solid fa-print text-stone-500"></i>
            <span>Cetak Bukti</span>
          </button>

          <!-- 3. Chat WhatsApp -->
          <a id="btn-wa-receipt-confirm" href="<?= get_whatsapp_url('Halo LIFLOW Support, saya telah menyelesaikan pembayaran Premium!') ?>" target="_blank" rel="noopener noreferrer" class="w-full bg-[#25D366] hover:bg-[#20BD5A] text-white py-3 px-3 rounded-xl font-bold text-xs transition flex items-center justify-center gap-1.5 shadow-xs">
            <i class="fa-brands fa-whatsapp text-sm"></i>
            <span>Chat WhatsApp</span>
          </a>
        </div>

      </div>

    </div>

  </div>
</div>

<!-- Printable Styles -->
<style>
@media print {
  body * { visibility: hidden !important; }
  #printable-receipt, #printable-receipt * { visibility: visible !important; }
  #printable-receipt {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    border: 1px solid #000;
  }
}
</style>

<script>
/**
 * Midtrans Checkout & Transaction Logic
 */
(function() {
  let selectedPlan = 'monthly'; // 'monthly' (15000) or 'yearly' (70000)
  let selectedMethod = 'qris';
  let activeOrder = null;

  window.openMidtransModal = function(planDuration = 'monthly') {
    selectPaymentDuration(planDuration);
    switchPaymentMethodTab('qris');
    if (window.removeSelectedProof) window.removeSelectedProof();
    
    const modal = document.getElementById('midtrans-modal');
    const viewCheckout = document.getElementById('mt-view-checkout');
    const viewReceipt = document.getElementById('mt-view-receipt');

    if (viewCheckout) viewCheckout.classList.remove('hidden');
    if (viewReceipt) viewReceipt.classList.add('hidden');
    if (modal) modal.classList.remove('hidden');
  };

  window.closeMidtransModal = function() {
    const modal = document.getElementById('midtrans-modal');
    if (modal) modal.classList.add('hidden');
  };

  window.handleProofFileSelected = function(e) {
    const file = e.target.files && e.target.files[0];
    const valMsg = document.getElementById('proof-validation-msg');
    const dropzone = document.getElementById('proof-dropzone');
    const emptyState = document.getElementById('proof-empty-state');
    const previewState = document.getElementById('proof-preview-state');
    const previewImg = document.getElementById('proof-preview-img');
    const previewPdf = document.getElementById('proof-preview-pdf');
    const fileName = document.getElementById('proof-file-name');
    const fileSize = document.getElementById('proof-file-size');

    if (valMsg) valMsg.classList.add('hidden');
    if (dropzone) {
      dropzone.classList.remove('border-rose-400', 'bg-rose-50/30');
      dropzone.classList.add('border-liflowGreen', 'bg-emerald-50/20');
    }

    if (!file) {
      if (emptyState) emptyState.classList.remove('hidden');
      if (previewState) previewState.classList.add('hidden');
      return;
    }

    // Check file size (max 5MB)
    if (file.size > 5 * 1024 * 1024) {
      alert('Ukuran file maksimal 5MB. Silakan pilih file yang lebih kecil.');
      removeSelectedProof();
      return;
    }

    if (fileName) fileName.textContent = file.name;
    if (fileSize) {
      const sizeKb = (file.size / 1024).toFixed(1);
      const sizeMb = (file.size / (1024 * 1024)).toFixed(2);
      fileSize.textContent = file.size > 1024 * 1024 ? sizeMb + ' MB • Siap diunggah' : sizeKb + ' KB • Siap diunggah';
    }

    if (file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function(evt) {
        if (previewImg) {
          previewImg.src = evt.target.result;
          previewImg.classList.remove('hidden');
        }
        if (previewPdf) previewPdf.classList.add('hidden');
      };
      reader.readAsDataURL(file);
    } else {
      if (previewImg) previewImg.classList.add('hidden');
      if (previewPdf) previewPdf.classList.remove('hidden');
    }

    if (emptyState) emptyState.classList.add('hidden');
    if (previewState) {
      previewState.classList.remove('hidden');
      previewState.classList.add('flex');
    }
  };

  window.removeSelectedProof = function() {
    const proofInput = document.getElementById('mt-payment-proof');
    const emptyState = document.getElementById('proof-empty-state');
    const previewState = document.getElementById('proof-preview-state');
    const dropzone = document.getElementById('proof-dropzone');
    const valMsg = document.getElementById('proof-validation-msg');

    if (proofInput) proofInput.value = '';
    if (emptyState) emptyState.classList.remove('hidden');
    if (previewState) {
      previewState.classList.add('hidden');
      previewState.classList.remove('flex');
    }
    if (dropzone) {
      dropzone.classList.remove('border-liflowGreen', 'bg-emerald-50/20', 'border-rose-400', 'bg-rose-50/30');
      dropzone.classList.add('border-stone-200');
    }
    if (valMsg) valMsg.classList.add('hidden');
  };

  window.selectPaymentDuration = function(duration) {
    selectedPlan = duration === 'yearly' ? 'yearly' : 'monthly';

    const optMonthly = document.getElementById('opt-duration-monthly');
    const optYearly = document.getElementById('opt-duration-yearly');
    const qrisNominal = document.getElementById('mt-qris-nominal');
    const qrisImg = document.getElementById('mt-qris-image');

    if (selectedPlan === 'yearly') {
      if (optYearly) {
        optYearly.classList.add('border-liflowGreen', 'bg-emerald-50/40');
        optYearly.classList.remove('border-stone-200', 'bg-white');
      }
      if (optMonthly) {
        optMonthly.classList.remove('border-liflowGreen', 'bg-emerald-50/40');
        optMonthly.classList.add('border-stone-200', 'bg-white');
      }
      if (qrisNominal) qrisNominal.textContent = 'IDR 70.000';
      if (qrisImg) qrisImg.src = 'assets/img/qris_liflow.jpeg';
    } else {
      if (optMonthly) {
        optMonthly.classList.add('border-liflowGreen', 'bg-emerald-50/40');
        optMonthly.classList.remove('border-stone-200', 'bg-white');
      }
      if (optYearly) {
        optYearly.classList.remove('border-liflowGreen', 'bg-emerald-50/40');
        optYearly.classList.add('border-stone-200', 'bg-white');
      }
      if (qrisNominal) qrisNominal.textContent = 'IDR 15.000';
      if (qrisImg) qrisImg.src = 'assets/img/qris_liflow.jpeg';
    }
  };

  window.switchPaymentMethodTab = function(method) {
    selectedMethod = method;

    const tabs = ['qris', 'bank'];
    tabs.forEach(t => {
      const btn = document.getElementById('pm-tab-' + t);
      const detail = document.getElementById('pm-detail-' + t);
      if (t === method) {
        if (btn) {
          btn.className = 'py-3 px-3 rounded-2xl border-2 border-liflowGreen bg-emerald-50 text-emerald-800 transition flex flex-col items-center justify-center gap-1 shadow-xs';
        }
        if (detail) detail.classList.remove('hidden');
      } else {
        if (btn) {
          btn.className = 'py-3 px-3 rounded-2xl border-2 border-stone-200 bg-white text-stone-600 hover:bg-stone-50 transition flex flex-col items-center justify-center gap-1';
        }
        if (detail) detail.classList.add('hidden');
      }
    });
  };

  window.copyBriRekening = function() {
    const display = document.getElementById('bri-rekening-display');
    if (display && navigator.clipboard) {
      navigator.clipboard.writeText(display.textContent.trim()).then(() => {
        if (window.showToast) {
          window.showToast('Nomor Rekening BRI berhasil disalin!', 'success');
        } else {
          alert('Nomor Rekening BRI berhasil disalin: ' + display.textContent);
        }
      });
    }
  };

  window.executeMidtransPayment = async function() {
    const btn = document.getElementById('btn-process-payment');
    const nameInput = document.getElementById('mt-customer-name');
    const emailInput = document.getElementById('mt-customer-email');
    const proofInput = document.getElementById('mt-payment-proof');
    const valMsg = document.getElementById('proof-validation-msg');
    const dropzone = document.getElementById('proof-dropzone');

    // Validasi Wajib Upload Bukti Pembayaran sebelum confirm
    if (!proofInput || !proofInput.files || proofInput.files.length === 0) {
      if (valMsg) valMsg.classList.remove('hidden');
      if (dropzone) {
        dropzone.classList.add('border-rose-400', 'bg-rose-50/30');
        dropzone.classList.remove('border-stone-200');
        dropzone.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
      return;
    }

    const customerName = nameInput && nameInput.value.trim() ? nameInput.value.trim() : 'Pelanggan LIFLOW';
    const customerEmail = emailInput && emailInput.value.trim() ? emailInput.value.trim() : 'user@liflow.app';

    if (btn) {
      btn.disabled = true;
      btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i><span>Memverifikasi Bukti Pembayaran...</span>';
    }

    try {
      // 1. Create order
      const createRes = await fetch('index.php?api=create_payment', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          duration: selectedPlan,
          method: selectedMethod,
          name: customerName,
          email: customerEmail,
          phone: '085742546223'
        })
      });
      const createData = await createRes.json();

      if (!createData.success) {
        throw new Error(createData.message || 'Gagal membuat tagihan Midtrans.');
      }

      const orderId = createData.order_id;

      // 2. Confirm payment dengan FormData membawa file bukti pembayaran
      const confirmFormData = new FormData();
      confirmFormData.append('order_id', orderId);
      confirmFormData.append('method', selectedMethod);
      if (proofInput.files && proofInput.files[0]) {
        confirmFormData.append('proof', proofInput.files[0]);
      }

      const confirmRes = await fetch('index.php?api=confirm_payment', {
        method: 'POST',
        body: confirmFormData
      });
      const confirmData = await confirmRes.json();

      if (!confirmData.success) {
        throw new Error(confirmData.message || 'Gagal memverifikasi pembayaran.');
      }

      // 3. Render Receipt (Bukti Transaksi Resmi)
      const trx = confirmData.transaction;
      document.getElementById('rcpt-order-id').textContent = trx.order_id;
      document.getElementById('rcpt-date').textContent     = trx.transaction_time;
      document.getElementById('rcpt-name').textContent     = trx.customer_name;
      document.getElementById('rcpt-email').textContent    = trx.customer_email;
      document.getElementById('rcpt-plan').textContent     = trx.plan_name;
      document.getElementById('rcpt-method').textContent   = trx.payment_method;
      document.getElementById('rcpt-amount').textContent   = trx.amount_formatted;
      document.getElementById('rcpt-expires').textContent  = 'Aktif s/d ' + trx.expires_date;

      const proofLink = document.getElementById('rcpt-proof-link');
      if (proofLink) {
        if (trx.proof_file) {
          proofLink.href = trx.proof_file;
          proofLink.textContent = 'Lihat Bukti Terlampir (' + (trx.proof_file.split('/').pop()) + ')';
          proofLink.classList.remove('hidden');
        } else {
          proofLink.textContent = 'Terverifikasi';
        }
      }

      const waBtn = document.getElementById('btn-wa-receipt-confirm');
      if (waBtn && trx.whatsapp_url) {
        waBtn.href = trx.whatsapp_url;
      }

      // Switch to receipt view
      document.getElementById('mt-view-checkout').classList.add('hidden');
      document.getElementById('mt-view-receipt').classList.remove('hidden');

      if (window.showToast) {
        window.showToast('Pembayaran Midtrans Berhasil! Fitur Premium aktif.', 'success');
      }

    } catch (err) {
      alert('Terjadi kendala pembayaran: ' + err.message);
    } finally {
      if (btn) {
        btn.disabled = false;
        btn.innerHTML = '<i class="fa-solid fa-circle-check text-sm"></i><span>Konfirmasi &amp; Verifikasi Pembayaran</span>';
      }
    }
  };

  window.printTransactionReceipt = function() {
    window.print();
  };

  window.goToPremiumDashboard = function() {
    // If user is currently in guest mode, open login or reload into dashboard
    if (window.LIFLOW_CONFIG && window.LIFLOW_CONFIG.sessionUserId) {
      window.location.reload();
    } else {
      // Suggest login or redirect
      window.location.href = 'index.php';
    }
  };

  // Close modal when clicking outside
  document.addEventListener('click', function(e) {
    const modal = document.getElementById('midtrans-modal');
    if (modal && !modal.classList.contains('hidden') && e.target === modal) {
      window.closeMidtransModal();
    }
  });

  // ESC key to close
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      window.closeMidtransModal();
    }
  });
})();
</script>
