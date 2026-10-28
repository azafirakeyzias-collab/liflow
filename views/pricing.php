<!-- ========================================================
     LIFLOW - Pricing / Servis Page View
     Fitur: Free & Premium (Bulanan Rp 15.000 / Tahunan Rp 70.000)
     Integrasi Midtrans Gateway (QRIS & Transfer Bank BRI)
     Bukti Transaksi Premium (10 Bukti Asli WhatsApp & Midtrans)
     ======================================================== -->
<div id="view-pricing" class="view-transition hidden-view max-w-5xl mx-auto px-6 py-16 space-y-12">
  <div class="text-center space-y-4">
    <span class="text-xs font-bold text-liflowGreen uppercase tracking-wider block">Layanan &amp; Paket</span>
    <h2 class="text-4xl font-serif font-bold text-stone-900">Servis LIFLOW</h2>
    <p class="text-stone-500 font-light max-w-xl mx-auto">Pilih paket yang paling sesuai kebutuhan hidupmu. Tanpa biaya tersembunyi, tanpa tekanan.</p>
  </div>

  <!-- Tab Navigator -->
  <div class="flex justify-center">
    <div class="inline-flex bg-stone-100 rounded-2xl p-1.5 gap-1 flex-wrap justify-center shadow-xs">
      <button type="button" onclick="switchServiceTab('plans')" id="stab-btn-plans" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider bg-white text-stone-900 shadow-sm transition">
        <i class="fa-solid fa-crown text-amber-500 text-xs"></i>
        <span>Pilihan Paket</span>
      </button>
      <button type="button" onclick="switchServiceTab('proofs')" id="stab-btn-proofs" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-stone-400 hover:text-stone-600 transition">
        <i class="fa-solid fa-receipt text-emerald-600 text-xs"></i>
        <span>Bukti Transaksi</span>
        <span class="inline-flex items-center gap-1 bg-emerald-500 text-white text-[9px] font-black px-2 py-0.5 rounded-full shadow-xs">
          <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
          10 Bukti
        </span>
      </button>
      <button type="button" onclick="switchServiceTab('faq')" id="stab-btn-faq" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-stone-400 hover:text-stone-600 transition">
        <i class="fa-solid fa-circle-question text-stone-400 text-xs"></i>
        <span>FAQ</span>
      </button>
    </div>
  </div>

  <!-- ── Tab: Harga & Paket (Hanya Free dan Premium) ── -->
  <div id="stab-plans" class="space-y-8">
    <div class="grid md:grid-cols-2 max-w-4xl mx-auto gap-8">
      
      <!-- 1. LIFLOW Free -->
      <div class="bg-white border border-stone-200/90 p-8 rounded-[32px] space-y-6 flex flex-col justify-between shadow-xs hover:shadow-md transition">
        <div class="space-y-4">
          <div>
            <span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest block">LIFLOW Free</span>
            <span class="text-3xl sm:text-4xl font-extrabold text-stone-900 mt-1 block">IDR 0 <span class="text-xs font-normal text-stone-400">/ selamanya</span></span>
          </div>
          <p class="text-xs text-stone-500 leading-relaxed font-light">Akses penuh ke fitur esensial: planner harian, habit tracker, dan Pomodoro timer.</p>
          
          <div class="pt-2">
            <span class="text-[10px] font-bold text-stone-400 uppercase tracking-wider block mb-3">Fitur yang Didapatkan:</span>
            <ul class="space-y-2.5 text-xs text-stone-600">
              <li class="flex items-center gap-2"><i class="fa-solid fa-check text-liflowGreen"></i> Daily Planner &amp; Agenda Harian</li>
              <li class="flex items-center gap-2"><i class="fa-solid fa-check text-liflowGreen"></i> Habit Tracker &amp; Gentle Streak</li>
              <li class="flex items-center gap-2"><i class="fa-solid fa-check text-liflowGreen"></i> Standard Pomodoro Focus Timer</li>
              <li class="flex items-center gap-2"><i class="fa-solid fa-check text-liflowGreen"></i> Local Secure Database Sync (MySQL)</li>
            </ul>
          </div>
        </div>

        <div class="pt-4">
          <button onclick="showLeadCapture('Register')" class="w-full bg-stone-100 hover:bg-stone-200 text-stone-800 text-xs font-bold uppercase tracking-widest py-3.5 rounded-2xl transition shadow-xs">
            Mulai Gratis
          </button>
        </div>
      </div>

      <!-- 2. LIFLOW Premium (Bulanan Rp 15.000 / Tahunan Rp 70.000) -->
      <div class="bg-white border-2 border-liflowGreen p-8 rounded-[32px] space-y-6 flex flex-col justify-between relative shadow-xl">
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-gradient-to-r from-liflowGreen to-emerald-600 text-white text-[9px] font-black px-4 py-1 rounded-full uppercase tracking-widest shadow-sm">
          Pilihan Terbaik
        </div>

        <div class="space-y-4">
          <div class="flex items-center justify-between">
            <span class="text-[10px] font-bold text-liflowGreen uppercase tracking-widest block">LIFLOW Premium</span>
            <span class="text-[9px] font-extrabold uppercase px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 border border-blue-200">
              <i class="fa-solid fa-shield-halved text-[9px] mr-1"></i>Midtrans Pay
            </span>
          </div>

          <!-- Duration Selector Switcher -->
          <div class="bg-stone-100 p-1 rounded-2xl flex items-center gap-1">
            <button type="button" onclick="setPricingDuration('monthly')" id="btn-p-monthly" class="flex-1 py-2 px-3 rounded-xl font-bold text-xs bg-liflowGreen text-white shadow-xs transition text-center">
              1 Bulan
            </button>
            <button type="button" onclick="setPricingDuration('yearly')" id="btn-p-yearly" class="flex-1 py-2 px-3 rounded-xl font-bold text-xs bg-transparent text-stone-600 hover:bg-white/60 transition text-center relative">
              <span class="absolute -top-2.5 right-1 text-[8px] font-black uppercase tracking-wider bg-amber-400 text-stone-900 px-1.5 py-0.5 rounded-full">Hemat 61%!</span>
              1 Tahun
            </button>
          </div>

          <!-- Price Display -->
          <div>
            <div class="flex items-baseline gap-1">
              <span id="p-price-display" class="text-3xl sm:text-4xl font-extrabold text-stone-900">IDR 15.000</span>
              <span id="p-period-display" class="text-xs font-normal text-stone-400">/ bulan</span>
            </div>
            <p id="p-subtext-display" class="text-[11px] text-stone-500 font-light mt-1">Rp 500 / hari • Fleksibel diperpanjang tiap bulan.</p>
          </div>

          <!-- Feature List -->
          <div class="pt-1">
            <span class="text-[10px] font-bold text-stone-400 uppercase tracking-wider block mb-3">Semua Fitur Premium Terbuka:</span>
            <ul class="space-y-2 text-xs text-stone-700">
              <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-liflowGreen text-sm"></i> <strong>Semua fitur Free</strong> tanpa batas</li>
              <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-liflowGreen text-sm"></i> <strong>Plan Tomorrow:</strong> Rancang agenda hari esok bebas cemas</li>
              <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-liflowGreen text-sm"></i> <strong>Money Tracker:</strong> Arus kas, kategori, &amp; target finansial</li>
              <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-liflowGreen text-sm"></i> <strong>Deep Work Timer:</strong> Audio ambience &amp; kustomisasi waktu</li>
              <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-liflowGreen text-sm"></i> <strong>Radar Wheel:</strong> Analisis keseimbangan 6 pilar hidup</li>
              <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-liflowGreen text-sm"></i> <strong>Priority CS Support:</strong> Direct WhatsApp 1x1 (0857-4254-6223)</li>
            </ul>
          </div>
        </div>

        <!-- Checkout Action Button -->
        <div class="pt-4 space-y-2">
          <button type="button" onclick="openMidtransModal(pricingSelectedDuration)" class="w-full bg-[#25D366] hover:bg-[#20BD5A] text-white text-xs font-bold uppercase tracking-widest py-3.5 rounded-2xl shadow-lg hover:shadow-xl transition flex items-center justify-center gap-2">
            <i class="fa-solid fa-crown text-amber-300"></i>
            <span>Aktifkan Premium</span>
          </button>
          <div class="flex items-center justify-center gap-2 text-[10px] text-stone-400 text-center font-light">
            <i class="fa-solid fa-shield-halved text-emerald-600"></i>
            <span>Midtrans (QRIS &amp; Transfer Bank BRI)</span>
          </div>
        </div>

      </div>

    </div>

    <!-- Social Trust Card in Pilihan Paket -->
    <div class="max-w-4xl mx-auto bg-gradient-to-r from-emerald-50/70 via-stone-50 to-white border border-emerald-200/80 p-5 sm:p-6 rounded-3xl flex flex-col sm:flex-row items-center justify-between gap-4 shadow-xs mt-8">
      <div class="flex items-center gap-3 sm:gap-4 text-center sm:text-left">
        <div class="w-12 h-12 rounded-2xl bg-emerald-500 text-white flex items-center justify-center text-xl shadow-md shrink-0">
          <i class="fa-solid fa-shield-check"></i>
        </div>
        <div>
          <div class="flex items-center justify-center sm:justify-start gap-2">
            <span class="inline-block w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
            <h4 class="font-bold text-stone-900 text-sm sm:text-base">10+ Pengguna Baru Mengaktifkan Hari Ini</h4>
          </div>
          <p class="text-xs text-stone-500 font-light mt-0.5">Semua transaksi terverifikasi 100% via QRIS &amp; Transfer Bank BRI.</p>
        </div>
      </div>
      <button type="button" onclick="switchServiceTab('proofs')" class="w-full sm:w-auto px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold uppercase tracking-wider rounded-xl transition flex items-center justify-center gap-2 shadow-xs shrink-0">
        <span>Lihat 10 Bukti Transfer</span>
        <i class="fa-solid fa-arrow-right text-[10px]"></i>
      </button>
    </div>
  </div>

  <!-- ── Tab: Bukti Transaksi Premium (10 Bukti Nyata) ── -->
  <div id="stab-proofs" class="space-y-10 hidden">
    <!-- Header Section -->
    <div class="text-center space-y-3 max-w-3xl mx-auto">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-800 text-[10px] font-bold uppercase tracking-wider">
        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
        <span>100% Transparan • Real-Time Social Proof</span>
      </div>
      <h3 class="text-2xl sm:text-3xl font-serif font-bold text-stone-900">Bukti Transaksi Pembelian Fitur Premium</h3>
      <p class="text-xs sm:text-sm text-stone-500 font-light leading-relaxed">
        Berikut adalah 10 bukti transaksi nyata terbaru dari para pengguna LIFLOW yang mengaktifkan akses LIFLOW Premium (Paket Bulanan Rp 15.000 &amp; Tahunan Rp 70.000). Semua transaksi terkonfirmasi aman melalui WhatsApp Support dan Midtrans Payment Gateway.
      </p>
    </div>

    <!-- Trust Stats Grid -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 max-w-4xl mx-auto">
      <div class="bg-white border border-stone-200/80 p-4 rounded-2xl shadow-xs text-center space-y-1">
        <span class="text-2xl font-extrabold text-emerald-600 block">10</span>
        <span class="text-[10px] font-bold text-stone-700 uppercase tracking-wider block">Transaksi Terbaru</span>
        <span class="text-[10px] text-stone-400 block font-light">28 Oktober 2026</span>
      </div>
      <div class="bg-white border border-stone-200/80 p-4 rounded-2xl shadow-xs text-center space-y-1">
        <span class="text-2xl font-extrabold text-stone-900 block">100%</span>
        <span class="text-[10px] font-bold text-stone-700 uppercase tracking-wider block">Terverifikasi</span>
        <span class="text-[10px] text-stone-400 block font-light">Status Aktif &amp; Berhasil</span>
      </div>
      <div class="bg-white border border-stone-200/80 p-4 rounded-2xl shadow-xs text-center space-y-1">
        <span class="text-2xl font-extrabold text-liflowGreen block">&lt; 2 Menit</span>
        <span class="text-[10px] font-bold text-stone-700 uppercase tracking-wider block">Aktivasi Cepat</span>
        <span class="text-[10px] text-stone-400 block font-light">Langsung ke Dashboard</span>
      </div>
      <div class="bg-white border border-stone-200/80 p-4 rounded-2xl shadow-xs text-center space-y-1">
        <span class="text-2xl font-extrabold text-amber-500 block">4.9 ★</span>
        <span class="text-[10px] font-bold text-stone-700 uppercase tracking-wider block">Rating Layanan</span>
        <span class="text-[10px] text-stone-400 block font-light">Pelanggan Puas</span>
      </div>
    </div>

    <!-- Filter Pills -->
    <div class="flex items-center justify-center gap-2 flex-wrap">
      <span class="text-[10px] font-bold text-stone-400 uppercase tracking-wider mr-1">Filter:</span>
      <button type="button" onclick="filterProofs('all', this)" class="proof-filter-btn px-4 py-2 rounded-xl text-xs font-bold transition bg-emerald-600 text-white shadow-xs">Semua Bukti (10)</button>
      <button type="button" onclick="filterProofs('qris', this)" class="proof-filter-btn px-4 py-2 rounded-xl text-xs font-bold transition text-stone-500 bg-stone-100 hover:bg-stone-200">QRIS / E-Wallet</button>
      <button type="button" onclick="filterProofs('bank', this)" class="proof-filter-btn px-4 py-2 rounded-xl text-xs font-bold transition text-stone-500 bg-stone-100 hover:bg-stone-200">Transfer Bank &amp; WA</button>
    </div>

    <!-- 10 Proof Cards Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3 sm:gap-4 max-w-6xl mx-auto">
      
      <!-- Item 1 -->
      <div class="proof-card-item bg-white border border-stone-200/80 rounded-2xl p-3 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1" data-type="qris">
        <div>
          <div class="flex items-center justify-between gap-1 mb-2">
            <span class="inline-flex items-center gap-1 text-[9px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/80"><i class="fa-solid fa-circle-check text-emerald-500 text-[8px]"></i> Sukses</span>
            <span class="text-[10px] text-stone-400 font-semibold">18:49 WIB</span>
          </div>
          <div class="relative w-full aspect-[9/13] rounded-xl overflow-hidden bg-stone-100 border border-stone-100 cursor-pointer" onclick="openProofLightbox(0)">
            <img src="assets/img/proofs/Screenshot_20261028_184924_WhatsApp.jpg" alt="Bukti Transaksi 18:49" class="w-full h-full object-cover object-top transition duration-300 group-hover:scale-105" loading="lazy">
            <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-1 text-white backdrop-blur-[1px]">
              <div class="w-9 h-9 rounded-full bg-white text-stone-900 flex items-center justify-center text-xs shadow-md"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
              <span class="text-[9px] font-bold uppercase tracking-wider">Perbesar</span>
            </div>
          </div>
          <div class="mt-2.5 space-y-0.5">
            <span class="text-[9px] font-bold text-stone-400 uppercase tracking-widest block">Bukti #01</span>
            <h4 class="font-bold text-stone-900 text-xs truncate">Aktivasi Sesi Malam</h4>
            <span class="text-[10px] text-stone-500 block truncate font-light"><i class="fa-solid fa-qrcode text-emerald-600 text-[9px] mr-1"></i>Midtrans QRIS</span>
          </div>
        </div>
        <button type="button" onclick="openProofLightbox(0)" class="w-full mt-3 py-1.5 px-2 bg-stone-50 hover:bg-emerald-50 hover:text-emerald-700 text-stone-700 text-[10px] font-bold uppercase tracking-wider rounded-lg border border-stone-200/70 transition flex items-center justify-center gap-1">
          <i class="fa-solid fa-expand text-[8px]"></i><span>Lihat Bukti</span>
        </button>
      </div>

      <!-- Item 2 -->
      <div class="proof-card-item bg-white border border-stone-200/80 rounded-2xl p-3 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1" data-type="bank">
        <div>
          <div class="flex items-center justify-between gap-1 mb-2">
            <span class="inline-flex items-center gap-1 text-[9px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/80"><i class="fa-solid fa-circle-check text-emerald-500 text-[8px]"></i> Sukses</span>
            <span class="text-[10px] text-stone-400 font-semibold">15:36 WIB</span>
          </div>
          <div class="relative w-full aspect-[9/13] rounded-xl overflow-hidden bg-stone-100 border border-stone-100 cursor-pointer" onclick="openProofLightbox(1)">
            <img src="assets/img/proofs/Screenshot_20261028_153604_WhatsApp.jpg" alt="Bukti Transaksi 15:36" class="w-full h-full object-cover object-top transition duration-300 group-hover:scale-105" loading="lazy">
            <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-1 text-white backdrop-blur-[1px]">
              <div class="w-9 h-9 rounded-full bg-white text-stone-900 flex items-center justify-center text-xs shadow-md"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
              <span class="text-[9px] font-bold uppercase tracking-wider">Perbesar</span>
            </div>
          </div>
          <div class="mt-2.5 space-y-0.5">
            <span class="text-[9px] font-bold text-stone-400 uppercase tracking-widest block">Bukti #02</span>
            <h4 class="font-bold text-stone-900 text-xs truncate">Aktivasi Sesi Sore</h4>
            <span class="text-[10px] text-stone-500 block truncate font-light"><i class="fa-brands fa-whatsapp text-emerald-600 text-[9px] mr-1"></i>WhatsApp Pay</span>
          </div>
        </div>
        <button type="button" onclick="openProofLightbox(1)" class="w-full mt-3 py-1.5 px-2 bg-stone-50 hover:bg-emerald-50 hover:text-emerald-700 text-stone-700 text-[10px] font-bold uppercase tracking-wider rounded-lg border border-stone-200/70 transition flex items-center justify-center gap-1">
          <i class="fa-solid fa-expand text-[8px]"></i><span>Lihat Bukti</span>
        </button>
      </div>

      <!-- Item 3 -->
      <div class="proof-card-item bg-white border border-stone-200/80 rounded-2xl p-3 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1" data-type="bank">
        <div>
          <div class="flex items-center justify-between gap-1 mb-2">
            <span class="inline-flex items-center gap-1 text-[9px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/80"><i class="fa-solid fa-circle-check text-emerald-500 text-[8px]"></i> Sukses</span>
            <span class="text-[10px] text-stone-400 font-semibold">14:50 WIB</span>
          </div>
          <div class="relative w-full aspect-[9/13] rounded-xl overflow-hidden bg-stone-100 border border-stone-100 cursor-pointer" onclick="openProofLightbox(2)">
            <img src="assets/img/proofs/Screenshot_20261028_145003_WhatsApp.jpg" alt="Bukti Transaksi 14:50" class="w-full h-full object-cover object-top transition duration-300 group-hover:scale-105" loading="lazy">
            <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-1 text-white backdrop-blur-[1px]">
              <div class="w-9 h-9 rounded-full bg-white text-stone-900 flex items-center justify-center text-xs shadow-md"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
              <span class="text-[9px] font-bold uppercase tracking-wider">Perbesar</span>
            </div>
          </div>
          <div class="mt-2.5 space-y-0.5">
            <span class="text-[9px] font-bold text-stone-400 uppercase tracking-widest block">Bukti #03</span>
            <h4 class="font-bold text-stone-900 text-xs truncate">Aktivasi Sesi Siang</h4>
            <span class="text-[10px] text-stone-500 block truncate font-light"><i class="fa-solid fa-building-columns text-blue-600 text-[9px] mr-1"></i>Bank BRI</span>
          </div>
        </div>
        <button type="button" onclick="openProofLightbox(2)" class="w-full mt-3 py-1.5 px-2 bg-stone-50 hover:bg-emerald-50 hover:text-emerald-700 text-stone-700 text-[10px] font-bold uppercase tracking-wider rounded-lg border border-stone-200/70 transition flex items-center justify-center gap-1">
          <i class="fa-solid fa-expand text-[8px]"></i><span>Lihat Bukti</span>
        </button>
      </div>

      <!-- Item 4 -->
      <div class="proof-card-item bg-white border border-stone-200/80 rounded-2xl p-3 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1" data-type="qris">
        <div>
          <div class="flex items-center justify-between gap-1 mb-2">
            <span class="inline-flex items-center gap-1 text-[9px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/80"><i class="fa-solid fa-circle-check text-emerald-500 text-[8px]"></i> Sukses</span>
            <span class="text-[10px] text-stone-400 font-semibold">14:49 WIB</span>
          </div>
          <div class="relative w-full aspect-[9/13] rounded-xl overflow-hidden bg-stone-100 border border-stone-100 cursor-pointer" onclick="openProofLightbox(3)">
            <img src="assets/img/proofs/Screenshot_20261028_144904_WhatsApp.jpg" alt="Bukti Transaksi 14:49" class="w-full h-full object-cover object-top transition duration-300 group-hover:scale-105" loading="lazy">
            <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-1 text-white backdrop-blur-[1px]">
              <div class="w-9 h-9 rounded-full bg-white text-stone-900 flex items-center justify-center text-xs shadow-md"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
              <span class="text-[9px] font-bold uppercase tracking-wider">Perbesar</span>
            </div>
          </div>
          <div class="mt-2.5 space-y-0.5">
            <span class="text-[9px] font-bold text-stone-400 uppercase tracking-widest block">Bukti #04</span>
            <h4 class="font-bold text-stone-900 text-xs truncate">Midtrans Gateway</h4>
            <span class="text-[10px] text-stone-500 block truncate font-light"><i class="fa-solid fa-shield-halved text-emerald-600 text-[9px] mr-1"></i>QRIS Instant</span>
          </div>
        </div>
        <button type="button" onclick="openProofLightbox(3)" class="w-full mt-3 py-1.5 px-2 bg-stone-50 hover:bg-emerald-50 hover:text-emerald-700 text-stone-700 text-[10px] font-bold uppercase tracking-wider rounded-lg border border-stone-200/70 transition flex items-center justify-center gap-1">
          <i class="fa-solid fa-expand text-[8px]"></i><span>Lihat Bukti</span>
        </button>
      </div>

      <!-- Item 5 -->
      <div class="proof-card-item bg-white border border-stone-200/80 rounded-2xl p-3 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1" data-type="qris">
        <div>
          <div class="flex items-center justify-between gap-1 mb-2">
            <span class="inline-flex items-center gap-1 text-[9px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/80"><i class="fa-solid fa-circle-check text-emerald-500 text-[8px]"></i> Sukses</span>
            <span class="text-[10px] text-stone-400 font-semibold">13:39 WIB</span>
          </div>
          <div class="relative w-full aspect-[9/13] rounded-xl overflow-hidden bg-stone-100 border border-stone-100 cursor-pointer" onclick="openProofLightbox(4)">
            <img src="assets/img/proofs/Screenshot_20261028_133927_WhatsApp.jpg" alt="Bukti Transaksi 13:39" class="w-full h-full object-cover object-top transition duration-300 group-hover:scale-105" loading="lazy">
            <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-1 text-white backdrop-blur-[1px]">
              <div class="w-9 h-9 rounded-full bg-white text-stone-900 flex items-center justify-center text-xs shadow-md"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
              <span class="text-[9px] font-bold uppercase tracking-wider">Perbesar</span>
            </div>
          </div>
          <div class="mt-2.5 space-y-0.5">
            <span class="text-[9px] font-bold text-stone-400 uppercase tracking-widest block">Bukti #05</span>
            <h4 class="font-bold text-stone-900 text-xs truncate">Aktivasi Premium</h4>
            <span class="text-[10px] text-stone-500 block truncate font-light"><i class="fa-solid fa-qrcode text-emerald-600 text-[9px] mr-1"></i>QRIS All-Ewallet</span>
          </div>
        </div>
        <button type="button" onclick="openProofLightbox(4)" class="w-full mt-3 py-1.5 px-2 bg-stone-50 hover:bg-emerald-50 hover:text-emerald-700 text-stone-700 text-[10px] font-bold uppercase tracking-wider rounded-lg border border-stone-200/70 transition flex items-center justify-center gap-1">
          <i class="fa-solid fa-expand text-[8px]"></i><span>Lihat Bukti</span>
        </button>
      </div>

      <!-- Item 6 -->
      <div class="proof-card-item bg-white border border-stone-200/80 rounded-2xl p-3 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1" data-type="bank">
        <div>
          <div class="flex items-center justify-between gap-1 mb-2">
            <span class="inline-flex items-center gap-1 text-[9px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/80"><i class="fa-solid fa-circle-check text-emerald-500 text-[8px]"></i> Sukses</span>
            <span class="text-[10px] text-stone-400 font-semibold">13:33 WIB</span>
          </div>
          <div class="relative w-full aspect-[9/13] rounded-xl overflow-hidden bg-stone-100 border border-stone-100 cursor-pointer" onclick="openProofLightbox(5)">
            <img src="assets/img/proofs/Screenshot_20261028_133335_WhatsApp.jpg" alt="Bukti Transaksi 13:33" class="w-full h-full object-cover object-top transition duration-300 group-hover:scale-105" loading="lazy">
            <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-1 text-white backdrop-blur-[1px]">
              <div class="w-9 h-9 rounded-full bg-white text-stone-900 flex items-center justify-center text-xs shadow-md"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
              <span class="text-[9px] font-bold uppercase tracking-wider">Perbesar</span>
            </div>
          </div>
          <div class="mt-2.5 space-y-0.5">
            <span class="text-[9px] font-bold text-stone-400 uppercase tracking-widest block">Bukti #06</span>
            <h4 class="font-bold text-stone-900 text-xs truncate">Mobile Banking Pay</h4>
            <span class="text-[10px] text-stone-500 block truncate font-light"><i class="fa-solid fa-building-columns text-blue-600 text-[9px] mr-1"></i>Bank Transfer</span>
          </div>
        </div>
        <button type="button" onclick="openProofLightbox(5)" class="w-full mt-3 py-1.5 px-2 bg-stone-50 hover:bg-emerald-50 hover:text-emerald-700 text-stone-700 text-[10px] font-bold uppercase tracking-wider rounded-lg border border-stone-200/70 transition flex items-center justify-center gap-1">
          <i class="fa-solid fa-expand text-[8px]"></i><span>Lihat Bukti</span>
        </button>
      </div>

      <!-- Item 7 -->
      <div class="proof-card-item bg-white border border-stone-200/80 rounded-2xl p-3 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1" data-type="bank">
        <div>
          <div class="flex items-center justify-between gap-1 mb-2">
            <span class="inline-flex items-center gap-1 text-[9px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/80"><i class="fa-solid fa-circle-check text-emerald-500 text-[8px]"></i> Sukses</span>
            <span class="text-[10px] text-stone-400 font-semibold">11:58 WIB</span>
          </div>
          <div class="relative w-full aspect-[9/13] rounded-xl overflow-hidden bg-stone-100 border border-stone-100 cursor-pointer" onclick="openProofLightbox(6)">
            <img src="assets/img/proofs/Screenshot_20261028_115821_WhatsApp.jpg" alt="Bukti Transaksi 11:58" class="w-full h-full object-cover object-top transition duration-300 group-hover:scale-105" loading="lazy">
            <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-1 text-white backdrop-blur-[1px]">
              <div class="w-9 h-9 rounded-full bg-white text-stone-900 flex items-center justify-center text-xs shadow-md"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
              <span class="text-[9px] font-bold uppercase tracking-wider">Perbesar</span>
            </div>
          </div>
          <div class="mt-2.5 space-y-0.5">
            <span class="text-[9px] font-bold text-stone-400 uppercase tracking-widest block">Bukti #07</span>
            <h4 class="font-bold text-stone-900 text-xs truncate">Konfirmasi WhatsApp</h4>
            <span class="text-[10px] text-stone-500 block truncate font-light"><i class="fa-brands fa-whatsapp text-emerald-600 text-[9px] mr-1"></i>Support Verified</span>
          </div>
        </div>
        <button type="button" onclick="openProofLightbox(6)" class="w-full mt-3 py-1.5 px-2 bg-stone-50 hover:bg-emerald-50 hover:text-emerald-700 text-stone-700 text-[10px] font-bold uppercase tracking-wider rounded-lg border border-stone-200/70 transition flex items-center justify-center gap-1">
          <i class="fa-solid fa-expand text-[8px]"></i><span>Lihat Bukti</span>
        </button>
      </div>

      <!-- Item 8 -->
      <div class="proof-card-item bg-white border border-stone-200/80 rounded-2xl p-3 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1" data-type="qris">
        <div>
          <div class="flex items-center justify-between gap-1 mb-2">
            <span class="inline-flex items-center gap-1 text-[9px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/80"><i class="fa-solid fa-circle-check text-emerald-500 text-[8px]"></i> Sukses</span>
            <span class="text-[10px] text-stone-400 font-semibold">11:58 WIB</span>
          </div>
          <div class="relative w-full aspect-[9/13] rounded-xl overflow-hidden bg-stone-100 border border-stone-100 cursor-pointer" onclick="openProofLightbox(7)">
            <img src="assets/img/proofs/Screenshot_20261028_115804_WhatsApp.jpg" alt="Bukti Transaksi 11:58" class="w-full h-full object-cover object-top transition duration-300 group-hover:scale-105" loading="lazy">
            <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-1 text-white backdrop-blur-[1px]">
              <div class="w-9 h-9 rounded-full bg-white text-stone-900 flex items-center justify-center text-xs shadow-md"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
              <span class="text-[9px] font-bold uppercase tracking-wider">Perbesar</span>
            </div>
          </div>
          <div class="mt-2.5 space-y-0.5">
            <span class="text-[9px] font-bold text-stone-400 uppercase tracking-widest block">Bukti #08</span>
            <h4 class="font-bold text-stone-900 text-xs truncate">QRIS Scan Otomatis</h4>
            <span class="text-[10px] text-stone-500 block truncate font-light"><i class="fa-solid fa-qrcode text-emerald-600 text-[9px] mr-1"></i>Aktivasi Instan</span>
          </div>
        </div>
        <button type="button" onclick="openProofLightbox(7)" class="w-full mt-3 py-1.5 px-2 bg-stone-50 hover:bg-emerald-50 hover:text-emerald-700 text-stone-700 text-[10px] font-bold uppercase tracking-wider rounded-lg border border-stone-200/70 transition flex items-center justify-center gap-1">
          <i class="fa-solid fa-expand text-[8px]"></i><span>Lihat Bukti</span>
        </button>
      </div>

      <!-- Item 9 -->
      <div class="proof-card-item bg-white border border-stone-200/80 rounded-2xl p-3 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1" data-type="bank">
        <div>
          <div class="flex items-center justify-between gap-1 mb-2">
            <span class="inline-flex items-center gap-1 text-[9px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/80"><i class="fa-solid fa-circle-check text-emerald-500 text-[8px]"></i> Sukses</span>
            <span class="text-[10px] text-stone-400 font-semibold">10:42 WIB</span>
          </div>
          <div class="relative w-full aspect-[9/13] rounded-xl overflow-hidden bg-stone-100 border border-stone-100 cursor-pointer" onclick="openProofLightbox(8)">
            <img src="assets/img/proofs/Screenshot_20261028_104251_WhatsApp.jpg" alt="Bukti Transaksi 10:42" class="w-full h-full object-cover object-top transition duration-300 group-hover:scale-105" loading="lazy">
            <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-1 text-white backdrop-blur-[1px]">
              <div class="w-9 h-9 rounded-full bg-white text-stone-900 flex items-center justify-center text-xs shadow-md"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
              <span class="text-[9px] font-bold uppercase tracking-wider">Perbesar</span>
            </div>
          </div>
          <div class="mt-2.5 space-y-0.5">
            <span class="text-[9px] font-bold text-stone-400 uppercase tracking-widest block">Bukti #09</span>
            <h4 class="font-bold text-stone-900 text-xs truncate">Aktivasi Sesi Pagi</h4>
            <span class="text-[10px] text-stone-500 block truncate font-light"><i class="fa-solid fa-building-columns text-blue-600 text-[9px] mr-1"></i>Bank Transfer</span>
          </div>
        </div>
        <button type="button" onclick="openProofLightbox(8)" class="w-full mt-3 py-1.5 px-2 bg-stone-50 hover:bg-emerald-50 hover:text-emerald-700 text-stone-700 text-[10px] font-bold uppercase tracking-wider rounded-lg border border-stone-200/70 transition flex items-center justify-center gap-1">
          <i class="fa-solid fa-expand text-[8px]"></i><span>Lihat Bukti</span>
        </button>
      </div>

      <!-- Item 10 -->
      <div class="proof-card-item bg-white border border-stone-200/80 rounded-2xl p-3 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1" data-type="qris">
        <div>
          <div class="flex items-center justify-between gap-1 mb-2">
            <span class="inline-flex items-center gap-1 text-[9px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/80"><i class="fa-solid fa-circle-check text-emerald-500 text-[8px]"></i> Sukses</span>
            <span class="text-[10px] text-stone-400 font-semibold">10:21 WIB</span>
          </div>
          <div class="relative w-full aspect-[9/13] rounded-xl overflow-hidden bg-stone-100 border border-stone-100 cursor-pointer" onclick="openProofLightbox(9)">
            <img src="assets/img/proofs/Screenshot_20261028_102101_WhatsApp.jpg" alt="Bukti Transaksi 10:21" class="w-full h-full object-cover object-top transition duration-300 group-hover:scale-105" loading="lazy">
            <div class="absolute inset-0 bg-stone-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-1 text-white backdrop-blur-[1px]">
              <div class="w-9 h-9 rounded-full bg-white text-stone-900 flex items-center justify-center text-xs shadow-md"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
              <span class="text-[9px] font-bold uppercase tracking-wider">Perbesar</span>
            </div>
          </div>
          <div class="mt-2.5 space-y-0.5">
            <span class="text-[9px] font-bold text-stone-400 uppercase tracking-widest block">Bukti #10</span>
            <h4 class="font-bold text-stone-900 text-xs truncate">Aktivasi Perdana</h4>
            <span class="text-[10px] text-stone-500 block truncate font-light"><i class="fa-solid fa-bolt text-amber-500 text-[9px] mr-1"></i>Fast Settlement</span>
          </div>
        </div>
        <button type="button" onclick="openProofLightbox(9)" class="w-full mt-3 py-1.5 px-2 bg-stone-50 hover:bg-emerald-50 hover:text-emerald-700 text-stone-700 text-[10px] font-bold uppercase tracking-wider rounded-lg border border-stone-200/70 transition flex items-center justify-center gap-1">
          <i class="fa-solid fa-expand text-[8px]"></i><span>Lihat Bukti</span>
        </button>
      </div>

    </div>

    <!-- Bottom Conversion Banner in Bukti Transaksi -->
    <div class="bg-gradient-to-br from-emerald-500 via-emerald-600 to-teal-700 text-white p-8 sm:p-10 rounded-[32px] shadow-xl relative overflow-hidden">
      <div class="absolute -right-12 -bottom-12 w-64 h-64 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
      <div class="relative z-10 max-w-3xl space-y-4">
        <span class="text-[10px] font-bold tracking-widest uppercase bg-white/20 text-white px-3 py-1 rounded-full inline-block backdrop-blur-xs">Garansi Kepuasan &amp; Aktivasi Cepat</span>
        <h3 class="text-2xl sm:text-3xl font-serif font-bold text-white">Siap Mengatur Hidup Bebas Cemas dengan LIFLOW Premium?</h3>
        <p class="text-xs sm:text-sm text-emerald-100 font-light leading-relaxed">
          Dapatkan semua 10 alur fitur: Daily Planner, Gentle Habit Tracker, Deep Work Pomodoro, Money Tracker, dan Life Score Radar Wheel. Mulai dari Rp 15.000 / bulan!
        </p>
        <div class="pt-2 flex flex-col sm:flex-row items-center gap-3">
          <button type="button" onclick="switchServiceTab('plans')" class="w-full sm:w-auto px-6 py-3.5 bg-white hover:bg-stone-100 text-emerald-800 text-xs font-bold uppercase tracking-wider rounded-2xl shadow-lg transition flex items-center justify-center gap-2">
            <i class="fa-solid fa-crown text-amber-500"></i>
            <span>Pilih Paket &amp; Aktifkan Sekarang</span>
          </button>
          <a href="<?= get_whatsapp_url('Halo LIFLOW, saya melihat bukti transaksi premium dan ingin bertanya seputar aktivasi...') ?>" target="_blank" rel="noopener noreferrer" class="w-full sm:w-auto px-6 py-3.5 bg-emerald-700/80 hover:bg-emerald-700 text-white text-xs font-bold uppercase tracking-wider rounded-2xl border border-white/20 transition flex items-center justify-center gap-2">
            <i class="fa-brands fa-whatsapp text-sm"></i>
            <span>Tanya Admin via WhatsApp</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- ── Tab: FAQ ── -->
  <div id="stab-faq" class="max-w-3xl mx-auto space-y-4 hidden">
    <div class="text-center space-y-2 mb-8">
      <h3 class="text-2xl font-serif font-bold text-stone-900">Pertanyaan Umum Seputar Layanan</h3>
      <p class="text-xs text-stone-500 font-light">Jawaban cepat untuk pertanyaan yang paling sering ditanyakan.</p>
    </div>

    <div class="bg-white border border-stone-200/80 p-6 rounded-2xl cursor-pointer" onclick="toggleFaq(1)">
      <div class="flex justify-between items-center"><h4 class="font-bold text-stone-900 text-xs sm:text-sm">Berapa biaya langganan LIFLOW Premium?</h4><i id="faq-icon-1" class="fa-solid fa-chevron-down text-stone-400 text-xs transition-transform"></i></div>
      <p id="faq-answer-1" class="text-[11px] text-stone-500 mt-3 leading-relaxed hidden">LIFLOW Premium tersedia dalam 2 pilihan durasi yang sangat terjangkau: <strong>1 Bulan seharga IDR 15.000</strong> dan <strong>1 Tahun seharga IDR 70.000</strong> (Hemat 61% atau hanya ~Rp 5.800/bulan). Anda juga dapat menggunakan paket Free selamanya secara gratis.</p>
    </div>

    <div class="bg-white border border-stone-200/80 p-6 rounded-2xl cursor-pointer" onclick="toggleFaq(2)">
      <div class="flex justify-between items-center"><h4 class="font-bold text-stone-900 text-xs sm:text-sm">Bagaimana cara pembayaran dan apakah ada bukti transaksi resmi?</h4><i id="faq-icon-2" class="fa-solid fa-chevron-down text-stone-400 text-xs transition-transform"></i></div>
      <p id="faq-answer-2" class="text-[11px] text-stone-500 mt-3 leading-relaxed hidden">Pembayaran diproses aman melalui perantara gateway <strong>Midtrans</strong>. Anda dapat memilih metode pembayaran: <strong>QRIS</strong> (GoPay, OVO, Dana, ShopeePay, BCA Mobile, Livin, BRImo, dll) atau <strong>Transfer Bank BRI</strong> langsung (No. Rekening: <strong>309501028629531</strong>). Setelah pembayaran, Anda langsung menerima <strong>Bukti Transaksi Resmi (Invoice / E-Receipt)</strong> yang dapat diunduh/dicetak.</p>
    </div>

    <div class="bg-white border border-stone-200/80 p-6 rounded-2xl cursor-pointer" onclick="toggleFaq(3)">
      <div class="flex justify-between items-center"><h4 class="font-bold text-stone-900 text-xs sm:text-sm">Apakah setelah bayar fitur premium langsung bisa diakses?</h4><i id="faq-icon-3" class="fa-solid fa-chevron-down text-stone-400 text-xs transition-transform"></i></div>
      <p id="faq-answer-3" class="text-[11px] text-stone-500 mt-3 leading-relaxed hidden">Ya! Begitu pembayaran Anda diverifikasi oleh Midtrans, sistem otomatis mengaktifkan status akun Anda menjadi Premium. Anda dapat langsung menggunakan semua fitur tanpa jeda waktu dan dapat langsung berkonsultasi via WhatsApp.</p>
    </div>

    <div class="bg-white border border-stone-200/80 p-6 rounded-2xl cursor-pointer" onclick="toggleFaq(4)">
      <div class="flex justify-between items-center"><h4 class="font-bold text-stone-900 text-xs sm:text-sm">Apakah bisa konfirmasi dan chat ke WhatsApp?</h4><i id="faq-icon-4" class="fa-solid fa-chevron-down text-stone-400 text-xs transition-transform"></i></div>
      <p id="faq-answer-4" class="text-[11px] text-stone-500 mt-3 leading-relaxed hidden">Tentu saja. Setelah transaksi selesai, tersedia tombol khusus untuk konfirmasi dan chat WhatsApp langsung ke nomor resmi kami di <strong>0857-4254-6223</strong> dengan rincian bukti transaksi otomatis.</p>
    </div>

    <!-- WhatsApp Support Banner -->
    <div class="mt-8 bg-gradient-to-r from-emerald-50 via-teal-50 to-stone-50 border border-emerald-200/60 p-6 rounded-3xl flex flex-col sm:flex-row items-center justify-between gap-4 shadow-xs">
      <div class="flex items-center gap-4 text-center sm:text-left">
        <div class="w-12 h-12 rounded-2xl bg-emerald-500 text-white flex items-center justify-center text-2xl shadow-md shrink-0">
          <i class="fa-brands fa-whatsapp"></i>
        </div>
        <div>
          <h4 class="font-serif font-bold text-stone-900 text-base">Masih Punya Pertanyaan Lain?</h4>
          <p class="text-xs text-stone-500 font-light">Konsultasikan kebutuhan manajemen hidup Anda langsung ke WhatsApp kami di <strong><?= htmlspecialchars(defined('WHATSAPP_DISPLAY') ? WHATSAPP_DISPLAY : '0857-4254-6223') ?></strong>.</p>
        </div>
      </div>
      <a href="<?= get_whatsapp_url('Halo LIFLOW, saya ingin bertanya lebih lanjut seputar paket dan fitur.') ?>" target="_blank" rel="noopener noreferrer" class="w-full sm:w-auto px-6 py-3 bg-[#25D366] hover:bg-[#20BD5A] text-white text-xs font-bold uppercase tracking-wider rounded-xl transition flex items-center justify-center gap-2 shadow-md hover:shadow-lg shrink-0">
        <i class="fa-brands fa-whatsapp text-base"></i>
        <span>Chat Sekarang</span>
      </a>
    </div>
  </div>
</div>

<!-- ══════════════════════════════════════════════════════════
     PROOF LIGHTBOX MODAL (Interactive Image Viewer)
     ══════════════════════════════════════════════════════════ -->
<div id="proof-lightbox-modal" class="fixed inset-0 z-[150] bg-stone-950/85 backdrop-blur-md hidden flex items-center justify-center p-3 sm:p-6 transition-all" onclick="if(event.target === this) closeProofLightbox()">
  <div class="bg-stone-900 border border-stone-800 rounded-3xl max-w-4xl w-full max-h-[92vh] flex flex-col shadow-2xl overflow-hidden relative" onclick="event.stopPropagation()">
    <!-- Header -->
    <div class="px-5 py-3.5 bg-stone-900/90 border-b border-stone-800/80 flex items-center justify-between text-white">
      <div class="flex items-center gap-2 sm:gap-3 truncate">
        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse shrink-0"></span>
        <div class="truncate">
          <h4 id="lightbox-title" class="font-bold text-xs sm:text-sm text-stone-100 truncate">Bukti Transaksi Premium</h4>
          <span id="lightbox-meta" class="text-[10px] text-stone-400 block truncate font-light">28 Oktober 2026 • Terverifikasi</span>
        </div>
      </div>
      <div class="flex items-center gap-2 shrink-0">
        <span id="lightbox-counter" class="text-[11px] font-mono bg-stone-800 text-stone-300 px-2.5 py-1 rounded-full">1 / 10</span>
        <button type="button" onclick="closeProofLightbox()" class="w-8 h-8 rounded-full bg-stone-800 hover:bg-stone-700 text-stone-300 hover:text-white flex items-center justify-center transition" aria-label="Tutup">
          <i class="fa-solid fa-xmark text-sm"></i>
        </button>
      </div>
    </div>

    <!-- Image Display Area -->
    <div class="relative flex-1 bg-stone-950 flex items-center justify-center p-2 sm:p-4 min-h-[300px] overflow-hidden select-none">
      <img id="lightbox-img" src="" alt="Bukti Transaksi" class="max-h-[68vh] max-w-full object-contain rounded-xl shadow-2xl transition-all duration-200">
      
      <!-- Nav Arrows -->
      <button type="button" onclick="prevProofLightbox()" class="absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-stone-900/80 hover:bg-stone-800 text-white flex items-center justify-center transition shadow-lg border border-stone-700/60" title="Sebelumnya (Arrow Left)">
        <i class="fa-solid fa-chevron-left text-sm sm:text-base"></i>
      </button>
      <button type="button" onclick="nextProofLightbox()" class="absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-stone-900/80 hover:bg-stone-800 text-white flex items-center justify-center transition shadow-lg border border-stone-700/60" title="Berikutnya (Arrow Right)">
        <i class="fa-solid fa-chevron-right text-sm sm:text-base"></i>
      </button>
    </div>

    <!-- Footer Controls -->
    <div class="px-5 py-3 bg-stone-900/95 border-t border-stone-800 flex flex-wrap items-center justify-between gap-3 text-stone-400 text-xs">
      <div class="flex items-center gap-2">
        <i class="fa-solid fa-shield-check text-emerald-500"></i>
        <span class="text-[11px] text-stone-300">Bukti Asli WhatsApp Support &amp; Midtrans Payment</span>
      </div>
      <div class="flex items-center gap-2">
        <a id="lightbox-raw-link" href="#" target="_blank" rel="noopener noreferrer" class="px-3 py-1.5 rounded-lg bg-stone-800 hover:bg-stone-700 text-stone-200 text-[10px] font-bold uppercase tracking-wider transition flex items-center gap-1">
          <i class="fa-solid fa-arrow-up-right-from-square text-[9px]"></i>
          <span>Buka Resolusi Penuh</span>
        </a>
        <button type="button" onclick="closeProofLightbox(); switchServiceTab('plans');" class="px-3.5 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-500 text-white text-[10px] font-bold uppercase tracking-wider transition flex items-center gap-1 shadow-xs">
          <i class="fa-solid fa-crown text-amber-300 text-[9px]"></i>
          <span>Aktifkan Premium</span>
        </button>
      </div>
    </div>
  </div>
</div>

<script>
let pricingSelectedDuration = 'monthly';

function setPricingDuration(dur) {
  pricingSelectedDuration = dur === 'yearly' ? 'yearly' : 'monthly';
  const btnM = document.getElementById('btn-p-monthly');
  const btnY = document.getElementById('btn-p-yearly');
  const priceDisplay = document.getElementById('p-price-display');
  const periodDisplay = document.getElementById('p-period-display');
  const subtextDisplay = document.getElementById('p-subtext-display');

  if (pricingSelectedDuration === 'yearly') {
    if (btnY) {
      btnY.className = 'flex-1 py-2 px-3 rounded-xl font-bold text-xs bg-liflowGreen text-white shadow-xs transition text-center relative';
    }
    if (btnM) {
      btnM.className = 'flex-1 py-2 px-3 rounded-xl font-bold text-xs bg-transparent text-stone-600 hover:bg-white/60 transition text-center';
    }
    if (priceDisplay) priceDisplay.textContent = 'IDR 70.000';
    if (periodDisplay) periodDisplay.textContent = '/ tahun';
    if (subtextDisplay) subtextDisplay.textContent = 'Hanya ~Rp 5.800 / bulan • Hemat Rp 110.000 dibanding bulanan!';
  } else {
    if (btnM) {
      btnM.className = 'flex-1 py-2 px-3 rounded-xl font-bold text-xs bg-liflowGreen text-white shadow-xs transition text-center';
    }
    if (btnY) {
      btnY.className = 'flex-1 py-2 px-3 rounded-xl font-bold text-xs bg-transparent text-stone-600 hover:bg-white/60 transition text-center relative';
    }
    if (priceDisplay) priceDisplay.textContent = 'IDR 15.000';
    if (periodDisplay) periodDisplay.textContent = '/ bulan';
    if (subtextDisplay) subtextDisplay.textContent = 'Rp 500 / hari • Fleksibel diperpanjang tiap bulan.';
  }
}

// ══════════════════════════════════════════════════════════
// BUKTI TRANSAKSI DATA & LIGHTBOX CONTROLLER
// ══════════════════════════════════════════════════════════
const PROOF_DATA = [
  {
    src: 'assets/img/proofs/Screenshot_20261028_184924_WhatsApp.jpg',
    time: '18:49 WIB',
    date: '28 Oktober 2026',
    title: 'Aktivasi LIFLOW Premium (Sesi Malam)',
    method: 'Midtrans QRIS Realtime',
    user: 'Member #10',
    type: 'qris'
  },
  {
    src: 'assets/img/proofs/Screenshot_20261028_153604_WhatsApp.jpg',
    time: '15:36 WIB',
    date: '28 Oktober 2026',
    title: 'Aktivasi LIFLOW Premium (Sesi Sore)',
    method: 'WhatsApp Support Transfer',
    user: 'Member #09',
    type: 'bank'
  },
  {
    src: 'assets/img/proofs/Screenshot_20261028_145003_WhatsApp.jpg',
    time: '14:50 WIB',
    date: '28 Oktober 2026',
    title: 'Aktivasi LIFLOW Premium (Sesi Siang)',
    method: 'Transfer Bank BRI',
    user: 'Member #08',
    type: 'bank'
  },
  {
    src: 'assets/img/proofs/Screenshot_20261028_144904_WhatsApp.jpg',
    time: '14:49 WIB',
    date: '28 Oktober 2026',
    title: 'Aktivasi LIFLOW Premium',
    method: 'Midtrans Payment Gateway',
    user: 'Member #07',
    type: 'qris'
  },
  {
    src: 'assets/img/proofs/Screenshot_20261028_133927_WhatsApp.jpg',
    time: '13:39 WIB',
    date: '28 Oktober 2026',
    title: 'Aktivasi LIFLOW Premium',
    method: 'QRIS All Payment',
    user: 'Member #06',
    type: 'qris'
  },
  {
    src: 'assets/img/proofs/Screenshot_20261028_133335_WhatsApp.jpg',
    time: '13:33 WIB',
    date: '28 Oktober 2026',
    title: 'Aktivasi LIFLOW Premium',
    method: 'Mobile Banking Transfer',
    user: 'Member #05',
    type: 'bank'
  },
  {
    src: 'assets/img/proofs/Screenshot_20261028_115821_WhatsApp.jpg',
    time: '11:58 WIB',
    date: '28 Oktober 2026',
    title: 'Aktivasi LIFLOW Premium (Konfirmasi 2)',
    method: 'WhatsApp Official Chat',
    user: 'Member #04',
    type: 'bank'
  },
  {
    src: 'assets/img/proofs/Screenshot_20261028_115804_WhatsApp.jpg',
    time: '11:58 WIB',
    date: '28 Oktober 2026',
    title: 'Aktivasi LIFLOW Premium (Konfirmasi 1)',
    method: 'QRIS Dynamic Instant',
    user: 'Member #03',
    type: 'qris'
  },
  {
    src: 'assets/img/proofs/Screenshot_20261028_104251_WhatsApp.jpg',
    time: '10:42 WIB',
    date: '28 Oktober 2026',
    title: 'Aktivasi LIFLOW Premium (Sesi Pagi)',
    method: 'Transfer Bank Langsung',
    user: 'Member #02',
    type: 'bank'
  },
  {
    src: 'assets/img/proofs/Screenshot_20261028_102101_WhatsApp.jpg',
    time: '10:21 WIB',
    date: '28 Oktober 2026',
    title: 'Aktivasi LIFLOW Premium Perdana',
    method: 'QRIS Scan & Go',
    user: 'Member #01',
    type: 'qris'
  }
];

let currentProofIndex = 0;

function openProofLightbox(idx) {
  currentProofIndex = idx;
  const modal = document.getElementById('proof-lightbox-modal');
  if (!modal) return;
  updateLightboxContent();
  modal.classList.remove('hidden');
  document.body.classList.add('overflow-hidden');
}

function closeProofLightbox() {
  const modal = document.getElementById('proof-lightbox-modal');
  if (modal) modal.classList.add('hidden');
  document.body.classList.remove('overflow-hidden');
}

function prevProofLightbox() {
  currentProofIndex = (currentProofIndex - 1 + PROOF_DATA.length) % PROOF_DATA.length;
  updateLightboxContent();
}

function nextProofLightbox() {
  currentProofIndex = (currentProofIndex + 1) % PROOF_DATA.length;
  updateLightboxContent();
}

function updateLightboxContent() {
  const item = PROOF_DATA[currentProofIndex];
  if (!item) return;
  const imgEl = document.getElementById('lightbox-img');
  const titleEl = document.getElementById('lightbox-title');
  const metaEl = document.getElementById('lightbox-meta');
  const counterEl = document.getElementById('lightbox-counter');
  const linkEl = document.getElementById('lightbox-raw-link');

  if (imgEl) {
    imgEl.src = item.src;
    imgEl.alt = item.title;
  }
  if (titleEl) titleEl.textContent = item.title;
  if (metaEl) metaEl.textContent = `${item.date} • ${item.time} • ${item.method}`;
  if (counterEl) counterEl.textContent = `${currentProofIndex + 1} / ${PROOF_DATA.length}`;
  if (linkEl) linkEl.href = item.src;
}

function filterProofs(category, btn) {
  const buttons = document.querySelectorAll('.proof-filter-btn');
  buttons.forEach(b => {
    b.className = 'proof-filter-btn px-4 py-2 rounded-xl text-xs font-bold transition text-stone-500 bg-stone-100 hover:bg-stone-200';
  });
  if (btn) {
    btn.className = 'proof-filter-btn px-4 py-2 rounded-xl text-xs font-bold transition bg-emerald-600 text-white shadow-xs';
  }

  const cards = document.querySelectorAll('.proof-card-item');
  cards.forEach(c => {
    const cType = c.getAttribute('data-type');
    if (category === 'all' || cType === category) {
      c.classList.remove('hidden');
    } else {
      c.classList.add('hidden');
    }
  });
}

document.addEventListener('keydown', function(e) {
  const modal = document.getElementById('proof-lightbox-modal');
  if (modal && !modal.classList.contains('hidden')) {
    if (e.key === 'Escape') closeProofLightbox();
    else if (e.key === 'ArrowLeft') prevProofLightbox();
    else if (e.key === 'ArrowRight') nextProofLightbox();
  }
});
</script>
