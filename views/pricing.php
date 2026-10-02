<!-- ========================================================
     LIFLOW - Pricing / Servis Page View (Tab System)
     ======================================================== -->
<div id="view-pricing" class="view-transition hidden-view max-w-5xl mx-auto px-6 py-16 space-y-12">
  <div class="text-center space-y-4">
    <span class="text-xs font-bold text-liflowGreen uppercase tracking-wider block">Layanan &amp; Paket</span>
    <h2 class="text-4xl font-serif font-bold text-stone-900">Servis LIFLOW</h2>
    <p class="text-stone-500 font-light max-w-xl mx-auto">Pilih paket yang paling sesuai kebutuhan hidupmu. Tanpa biaya tersembunyi, tanpa tekanan.</p>
  </div>

  <!-- Tab Navigator -->
  <div class="flex justify-center">
    <div class="inline-flex bg-stone-100 rounded-2xl p-1.5 gap-1">
      <button onclick="switchServiceTab('plans')"    id="stab-btn-plans"    class="px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider bg-white text-stone-900 shadow-sm transition">Harga &amp; Paket</button>
      <button onclick="switchServiceTab('bundling')" id="stab-btn-bundling" class="px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-stone-400 hover:text-stone-600 transition">Bundling</button>
      <button onclick="switchServiceTab('faq')"      id="stab-btn-faq"      class="px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-stone-400 hover:text-stone-600 transition">FAQ</button>
    </div>
  </div>

  <!-- ── Tab: Harga & Paket ── -->
  <div id="stab-plans" class="space-y-8">
    <div class="grid md:grid-cols-3 gap-8">
      <!-- Free -->
      <div class="bg-white border border-stone-200 p-8 rounded-3xl space-y-6 flex flex-col justify-between shadow-xs">
        <div class="space-y-3">
          <span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest block">LIFLOW Free</span>
          <span class="text-3xl font-extrabold text-stone-900">IDR 0 <span class="text-xs font-normal text-stone-400">/ selamanya</span></span>
          <p class="text-[11px] text-stone-500 leading-relaxed">Akses penuh ke fitur dasar: planner harian, habit check, dan Pomodoro timer.</p>
          <ul class="space-y-2 text-[11px] text-stone-600 pt-3">
            <li><i class="fa-solid fa-check text-liflowGreen mr-1.5"></i> Daily Planner</li>
            <li><i class="fa-solid fa-check text-liflowGreen mr-1.5"></i> Habit Reminders &amp; Streaks</li>
            <li><i class="fa-solid fa-check text-liflowGreen mr-1.5"></i> Standard Pomodoro Mode</li>
            <li><i class="fa-solid fa-check text-liflowGreen mr-1.5"></i> Local Secure Sync</li>
          </ul>
        </div>
        <button onclick="showLeadCapture('Register')" class="w-full bg-stone-100 hover:bg-stone-200 text-stone-800 text-[10px] font-bold uppercase tracking-widest py-3 rounded-xl transition">Mulai Gratis</button>
      </div>

      <!-- Premium -->
      <div class="bg-white border-2 border-liflowGreen p-8 rounded-3xl space-y-6 flex flex-col justify-between relative shadow-md">
        <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-liflowGreen text-white text-[9px] font-bold px-3 py-1 rounded-full uppercase tracking-widest">Pilihan Terbaik</div>
        <div class="space-y-3">
          <span class="text-[10px] font-bold text-liflowGreen uppercase tracking-widest block">LIFLOW Premium</span>
          <span class="text-3xl font-extrabold text-stone-900">IDR 45.000 <span class="text-xs font-normal text-stone-400">/ bulan</span></span>
          <p class="text-[11px] text-stone-500 leading-relaxed">Akses penuh: Tomorrow Planning, Analytics lanjutan, Money Tracker, dan backup otomatis.</p>
          <ul class="space-y-2 text-[11px] text-stone-600 pt-3">
            <li><i class="fa-solid fa-check text-liflowGreen mr-1.5"></i> Semua fitur Free</li>
            <li><i class="fa-solid fa-check text-liflowGreen mr-1.5"></i> Deep Work &amp; Custom Timer</li>
            <li><i class="fa-solid fa-check text-liflowGreen mr-1.5"></i> Money Tracker &amp; Targets</li>
            <li><i class="fa-solid fa-check text-liflowGreen mr-1.5"></i> Sunday Auto-Summary</li>
            <li><i class="fa-solid fa-check text-liflowGreen mr-1.5"></i> Life Balance Radar Wheel</li>
          </ul>
        </div>
        <button onclick="showLeadCapture('Register')" class="w-full bg-liflowGreen hover:bg-stone-700 text-white text-[10px] font-bold uppercase tracking-widest py-3 rounded-xl shadow-md transition">Aktifkan Premium</button>
      </div>

      <!-- Teams -->
      <div class="bg-stone-900 border border-stone-700 p-8 rounded-3xl space-y-6 flex flex-col justify-between shadow-xs">
        <div class="space-y-3">
          <span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest block">LIFLOW Teams</span>
          <span class="text-3xl font-extrabold text-white">IDR 150.000 <span class="text-xs font-normal text-stone-400">/ bulan</span></span>
          <p class="text-[11px] text-stone-400 leading-relaxed">Untuk tim atau komunitas. Kelola produktivitas bersama dengan shared dashboard &amp; analytics.</p>
          <ul class="space-y-2 text-[11px] text-stone-300 pt-3">
            <li><i class="fa-solid fa-check text-liflowGreen mr-1.5"></i> Semua fitur Premium</li>
            <li><i class="fa-solid fa-check text-liflowGreen mr-1.5"></i> Shared Team Dashboard</li>
            <li><i class="fa-solid fa-check text-liflowGreen mr-1.5"></i> Admin Panel &amp; Analytics</li>
            <li><i class="fa-solid fa-check text-liflowGreen mr-1.5"></i> Priority Support</li>
          </ul>
        </div>
        <button onclick="showLeadCapture('Register')" class="w-full bg-white text-stone-900 text-[10px] font-bold uppercase tracking-widest py-3 rounded-xl transition hover:bg-stone-100">Hubungi Kami</button>
      </div>
    </div>
  </div>

  <!-- ── Tab: Bundling ── -->
  <div id="stab-bundling" class="space-y-8 hidden">
    <div class="text-center space-y-2 mb-8">
      <h3 class="text-2xl font-serif font-bold text-stone-900">Paket Bundling Spesial</h3>
      <p class="text-xs text-stone-500 font-light">Hemat lebih banyak dengan paket bundling eksklusif kami.</p>
    </div>
    <div class="grid md:grid-cols-2 gap-8">
      <!-- Bundling Starter -->
      <div class="bg-gradient-to-br from-liflowGreen/10 to-liflowBlue/10 border border-liflowGreen/30 p-8 rounded-3xl space-y-4 hover:shadow-lg transition">
        <div class="flex justify-between items-start">
          <div><span class="text-[10px] font-bold text-liflowGreen uppercase tracking-widest block">Bundling Starter</span><h4 class="font-serif font-bold text-stone-900 text-xl mt-1">Life Kickstart Pack</h4></div>
          <span class="text-xs font-black text-liflowGreen bg-liflowGreen/10 px-3 py-1.5 rounded-full">Hemat 30%</span>
        </div>
        <p class="text-xs text-stone-600 font-light leading-relaxed">Bundling ideal untuk pemula. Termasuk 3 bulan Premium + Starter Template Pack.</p>
        <ul class="space-y-2 text-[11px] text-stone-700">
          <li><i class="fa-solid fa-box text-liflowGreen mr-2"></i> 3 Bulan LIFLOW Premium</li>
          <li><i class="fa-solid fa-layer-group text-liflowGreen mr-2"></i> 10+ Starter Habit Templates</li>
          <li><i class="fa-solid fa-book text-liflowGreen mr-2"></i> E-Book: "Flow Your Life" (PDF)</li>
          <li><i class="fa-solid fa-headset text-liflowGreen mr-2"></i> Onboarding Support 1x1</li>
        </ul>
        <div class="flex items-baseline gap-2">
          <span class="text-2xl font-extrabold text-stone-900">IDR 99.000</span>
          <span class="text-xs text-stone-400 line-through">IDR 135.000</span>
        </div>
        <button onclick="showLeadCapture('Register')" class="w-full bg-liflowGreen hover:bg-stone-700 text-white text-[10px] font-bold uppercase tracking-widest py-3 rounded-xl transition shadow-sm">Ambil Bundling Ini</button>
      </div>

      <!-- Bundling All-In-One -->
      <div class="bg-gradient-to-br from-stone-900 to-stone-800 border border-stone-700 p-8 rounded-3xl space-y-4 hover:shadow-xl transition">
        <div class="flex justify-between items-start">
          <div><span class="text-[10px] font-bold text-liflowYellow uppercase tracking-widest block">Bundling All-In-One</span><h4 class="font-serif font-bold text-white text-xl mt-1">Ultimate Life OS Pack</h4></div>
          <span class="text-xs font-black text-stone-900 bg-liflowYellow px-3 py-1.5 rounded-full">Hemat 50%</span>
        </div>
        <p class="text-xs text-stone-400 font-light leading-relaxed">Paket terlengkap untuk kamu yang serius menata hidup.</p>
        <ul class="space-y-2 text-[11px] text-stone-300">
          <li><i class="fa-solid fa-infinity text-liflowYellow mr-2"></i> 12 Bulan LIFLOW Premium</li>
          <li><i class="fa-solid fa-layer-group text-liflowYellow mr-2"></i> 30+ Premium Template Pack</li>
          <li><i class="fa-solid fa-video text-liflowYellow mr-2"></i> Workshop Online Eksklusif</li>
          <li><i class="fa-solid fa-users text-liflowYellow mr-2"></i> Akses Komunitas Private</li>
          <li><i class="fa-solid fa-star text-liflowYellow mr-2"></i> Priority Feature Requests</li>
        </ul>
        <div class="flex items-baseline gap-2">
          <span class="text-2xl font-extrabold text-white">IDR 299.000</span>
          <span class="text-xs text-stone-500 line-through">IDR 540.000</span>
        </div>
        <button onclick="showLeadCapture('Register')" class="w-full bg-liflowYellow hover:bg-amber-300 text-stone-900 text-[10px] font-bold uppercase tracking-widest py-3 rounded-xl transition shadow-md">Ambil Ultimate Pack</button>
      </div>
    </div>
  </div>

  <!-- ── Tab: FAQ ── -->
  <div id="stab-faq" class="max-w-3xl mx-auto space-y-4 hidden">
    <div class="text-center space-y-2 mb-8">
      <h3 class="text-2xl font-serif font-bold text-stone-900">Pertanyaan Umum</h3>
      <p class="text-xs text-stone-500 font-light">Jawaban cepat untuk pertanyaan yang paling sering ditanyakan.</p>
    </div>
    <div class="bg-white border p-6 rounded-2xl cursor-pointer" onclick="toggleFaq(1)">
      <div class="flex justify-between items-center"><h4 class="font-bold text-stone-900 text-xs sm:text-sm">Apa itu "no punishment design"?</h4><i id="faq-icon-1" class="fa-solid fa-chevron-down text-stone-400 text-xs transition-transform"></i></div>
      <p id="faq-answer-1" class="text-[11px] text-stone-500 mt-3 leading-relaxed hidden">LIFLOW tidak pernah memblokir atau mempermalukan Anda ketika rencana gagal. Kami membangun "Reset Challenges" yang fleksibel untuk membantu Anda membangun kembali momentum secara perlahan.</p>
    </div>
    <div class="bg-white border p-6 rounded-2xl cursor-pointer" onclick="toggleFaq(2)">
      <div class="flex justify-between items-center"><h4 class="font-bold text-stone-900 text-xs sm:text-sm">Apakah data saya aman?</h4><i id="faq-icon-2" class="fa-solid fa-chevron-down text-stone-400 text-xs transition-transform"></i></div>
      <p id="faq-answer-2" class="text-[11px] text-stone-500 mt-3 leading-relaxed hidden">Ya, sepenuhnya. Data kamu disimpan aman di database MySQL privat milik kamu sendiri — tidak ada pihak ketiga.</p>
    </div>
    <div class="bg-white border p-6 rounded-2xl cursor-pointer" onclick="toggleFaq(3)">
      <div class="flex justify-between items-center"><h4 class="font-bold text-stone-900 text-xs sm:text-sm">Bisa deploy ke server selain WAMP?</h4><i id="faq-icon-3" class="fa-solid fa-chevron-down text-stone-400 text-xs transition-transform"></i></div>
      <p id="faq-answer-3" class="text-[11px] text-stone-500 mt-3 leading-relaxed hidden">Ya! LIFLOW mendukung PHP + MySQL yang dapat di-deploy ke hosting manapun: cPanel, VPS, Railway, hingga Heroku. Deployment ke Flask/Streamlit direncanakan di Minggu 4.</p>
    </div>
    <div class="bg-white border p-6 rounded-2xl cursor-pointer" onclick="toggleFaq(4)">
      <div class="flex justify-between items-center"><h4 class="font-bold text-stone-900 text-xs sm:text-sm">Apakah bundling bisa di-upgrade nanti?</h4><i id="faq-icon-4" class="fa-solid fa-chevron-down text-stone-400 text-xs transition-transform"></i></div>
      <p id="faq-answer-4" class="text-[11px] text-stone-500 mt-3 leading-relaxed hidden">Tentu! Kamu bisa upgrade dari Starter ke All-In-One kapan saja. Sisa masa aktif akan dihitung secara proporsional.</p>
    </div>
  </div>
</div>
