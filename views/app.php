<!-- ========================================================
     LIFLOW Authenticated App Dashboard
     Sidebar + Main Content — Full Application Interface
     Mobile Responsive: Off-canvas drawer, Topbar hamburger,
     Bottom Navigation Bar, Fluid cards & Adaptive grids
     ======================================================== -->

<!-- ══ SIDEBAR BACKDROP (Mobile) ════════════════════════════ -->
<div id="sidebar-backdrop" onclick="toggleSidebar(false)" class="fixed inset-0 bg-stone-900/50 backdrop-blur-[2px] z-40 opacity-0 pointer-events-none transition-opacity duration-300 lg:hidden"></div>

<!-- ══ SIDEBAR ══════════════════════════════════════════════ -->
<aside id="app-sidebar" class="fixed lg:static inset-y-0 left-0 z-50 w-72 lg:w-64 h-full bg-white border-r border-stone-100 flex flex-col shrink-0 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out shadow-2xl lg:shadow-none">

  <!-- Logo & Mobile Close -->
  <div class="px-5 py-4 lg:px-6 lg:py-5 border-b border-stone-100 flex items-center justify-between">
    <div class="flex items-center gap-3">
      <img src="liflow.png" alt="LIFLOW" class="w-9 h-9 rounded-xl object-cover border border-stone-100" onerror="this.src='https://placehold.co/80/7F987E/ffffff?text=LF'">
      <div>
        <span class="font-bold text-stone-900 text-sm block leading-none">LIFLOW</span>
        <span class="text-[9px] text-stone-400 uppercase tracking-widest">Life OS</span>
      </div>
    </div>
    <button onclick="toggleSidebar(false)" class="lg:hidden w-8 h-8 rounded-full bg-stone-100 hover:bg-stone-200 text-stone-600 flex items-center justify-center transition" aria-label="Tutup Menu">
      <i class="fa-solid fa-xmark text-sm"></i>
    </button>
  </div>

  <!-- User Card -->
  <div class="mx-4 mt-4 p-3 bg-liflowBg rounded-2xl flex items-center gap-3 border border-stone-100">
    <div class="w-9 h-9 rounded-full bg-liflowGreen/20 border border-liflowGreen/30 flex items-center justify-center font-bold text-sm text-liflowGreen shrink-0">
      <?= strtoupper(substr($_SESSION['username'] ?? 'U', 0, 1)) ?>
    </div>
    <div class="overflow-hidden min-w-0">
      <span class="text-xs font-bold text-stone-900 block leading-none truncate"><?= htmlspecialchars($_SESSION['username'] ?? '') ?></span>
      <span class="text-[9px] text-stone-400 block truncate mt-0.5"><?= htmlspecialchars($_SESSION['email'] ?? '') ?></span>
    </div>
  </div>

  <!-- Navigation -->
  <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
    <button onclick="appNav('dashboard')"   id="nav-dashboard"   class="nav-item active w-full flex items-center gap-3 px-4 py-3 text-left text-sm font-semibold text-liflowGreen">
      <i class="fa-solid fa-house w-4 text-center"></i> Dashboard
    </button>
    <button onclick="appNav('planner')"     id="nav-planner"     class="nav-item w-full flex items-center gap-3 px-4 py-3 text-left text-sm font-medium text-stone-600">
      <i class="fa-regular fa-calendar-check w-4 text-center"></i> Daily Planner
    </button>
    <button onclick="appNav('habits')"      id="nav-habits"      class="nav-item w-full flex items-center gap-3 px-4 py-3 text-left text-sm font-medium text-stone-600">
      <i class="fa-solid fa-fire w-4 text-center text-amber-400"></i> Habit Tracker
    </button>
    <button onclick="appNav('money')"       id="nav-money"       class="nav-item w-full flex items-center gap-3 px-4 py-3 text-left text-sm font-medium text-stone-600">
      <i class="fa-solid fa-wallet w-4 text-center text-amber-500"></i> Money Tracker
    </button>
    <button onclick="appNav('focus')"       id="nav-focus"       class="nav-item w-full flex items-center gap-3 px-4 py-3 text-left text-sm font-medium text-stone-600">
      <i class="fa-solid fa-brain w-4 text-center text-liflowGreen"></i> Focus Mode
    </button>
    <button onclick="appNav('reflection')"  id="nav-reflection"  class="nav-item w-full flex items-center gap-3 px-4 py-3 text-left text-sm font-medium text-stone-600">
      <i class="fa-solid fa-moon w-4 text-center text-liflowPurple"></i> Daily Reflection
    </button>
    <button onclick="appNav('tomorrow')"    id="nav-tomorrow"    class="nav-item w-full flex items-center gap-3 px-4 py-3 text-left text-sm font-medium text-stone-600">
      <i class="fa-solid fa-rotate-right w-4 text-center text-liflowBlue"></i> Plan Tomorrow
    </button>
    <button onclick="appNav('progress')"    id="nav-progress"    class="nav-item w-full flex items-center gap-3 px-4 py-3 text-left text-sm font-medium text-stone-600">
      <i class="fa-solid fa-chart-radar w-4 text-center text-liflowPurple"></i> Progress
    </button>

    <!-- Divider -->
    <div class="pt-2 pb-1 px-4"><span class="text-[9px] font-bold text-stone-300 uppercase tracking-widest">Account</span></div>
    <button onclick="appNav('profile')"     id="nav-profile"     class="nav-item w-full flex items-center gap-3 px-4 py-3 text-left text-sm font-medium text-stone-600">
      <i class="fa-solid fa-user w-4 text-center"></i> Profile
    </button>
    <a href="<?= get_whatsapp_url('Halo LIFLOW Support, saya butuh bantuan terkait akun dashboard saya.') ?>" target="_blank" rel="noopener noreferrer" class="nav-item w-full flex items-center justify-between px-4 py-3 text-left text-sm font-medium text-emerald-700 hover:bg-emerald-50 rounded-2xl transition group">
      <span class="flex items-center gap-3">
        <i class="fa-brands fa-whatsapp w-4 text-center text-emerald-600 text-base"></i> WhatsApp Support
      </span>
      <span class="text-[9px] bg-emerald-100 text-emerald-700 font-bold px-2 py-0.5 rounded-full">CS</span>
    </a>
  </nav>

  <!-- Logout -->
  <div class="p-4 border-t border-stone-100">
    <button onclick="handleLogout()" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-stone-500 hover:bg-rose-50 hover:text-rose-500 transition">
      <i class="fa-solid fa-arrow-right-from-bracket w-4 text-center"></i> Keluar
    </button>
  </div>
</aside>

<!-- ══ MAIN CONTENT ══════════════════════════════════════════ -->
<main class="flex-1 min-w-0 flex flex-col h-full overflow-hidden relative">

  <!-- Top Bar -->
  <header class="h-16 bg-white border-b border-stone-100 flex items-center justify-between px-4 sm:px-6 lg:px-8 shrink-0">
    <div class="flex items-center gap-3 min-w-0">
      <button onclick="toggleSidebar(true)" class="lg:hidden w-9 h-9 rounded-xl bg-stone-50 hover:bg-stone-100 border border-stone-200/70 text-stone-700 flex items-center justify-center transition shrink-0 active:scale-95" aria-label="Buka Menu">
        <i class="fa-solid fa-bars text-sm"></i>
      </button>
      <div class="min-w-0">
        <h1 id="app-page-title" class="font-serif font-bold text-stone-900 text-base sm:text-lg leading-none truncate">Dashboard Utama</h1>
        <p  id="app-page-sub"   class="text-[10px] sm:text-[11px] text-stone-400 mt-0.5 truncate">Ringkasan keseimbangan dan agenda harimu 🌿</p>
      </div>
    </div>
    <div class="flex items-center gap-2 sm:gap-3 shrink-0">
      <span id="app-date" class="text-xs text-stone-400 hidden md:block"></span>
      <button onclick="appNav('profile')" class="w-8 h-8 rounded-full bg-liflowGreen/15 border border-liflowGreen/25 flex items-center justify-center font-bold text-xs text-liflowGreen hover:ring-2 hover:ring-liflowGreen/30 transition" title="Profil Akun">
        <?= strtoupper(substr($_SESSION['username'] ?? 'U', 0, 1)) ?>
      </button>
    </div>
  </header>

  <!-- Scrollable Sections -->
  <div class="flex-1 overflow-y-auto relative bg-liflowBg pb-24 lg:pb-8">

    <!-- ── 1. DASHBOARD ─────────────────────────────────── -->
    <section id="sec-dashboard" class="app-section active-section p-4 sm:p-6 lg:p-8 space-y-5 sm:space-y-8">

      <!-- Life Score + Quick Stats -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">
        <!-- Life Score Card -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-100 flex items-center gap-4 sm:gap-6 shadow-xs app-card">
          <div class="relative w-20 h-20 sm:w-24 sm:h-24 shrink-0">
            <svg class="w-20 h-20 sm:w-24 sm:h-24" viewBox="0 0 96 96">
              <circle cx="48" cy="48" r="35" fill="none" stroke="#F5F5F4" stroke-width="8"/>
              <circle cx="48" cy="48" r="35" fill="none" stroke="#7F987E" stroke-width="8"
                stroke-dasharray="220" stroke-dashoffset="39" stroke-linecap="round"
                style="transform:rotate(-90deg);transform-origin:center;transition:stroke-dashoffset 1.5s ease"/>
            </svg>
            <div class="absolute inset-0 flex items-center justify-center">
              <span id="dash-score" class="text-lg sm:text-xl font-extrabold text-stone-900">86</span>
            </div>
          </div>
          <div class="min-w-0">
            <span class="text-[9px] sm:text-[10px] font-bold text-stone-400 uppercase tracking-widest block">Life Score</span>
            <span class="text-xl sm:text-2xl font-extrabold text-stone-900 block leading-tight" id="dash-score-label">86</span>
            <span class="text-[9px] sm:text-[10px] font-semibold text-liflowGreen bg-emerald-50 px-2 py-0.5 rounded-full inline-block mt-1">Excellent ✨</span>
          </div>
        </div>

        <!-- Today Tasks -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-100 shadow-xs app-card">
          <div class="flex justify-between items-center mb-3 sm:mb-4">
            <span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest">Tugas Hari Ini</span>
            <button onclick="appNav('planner')" class="text-[10px] font-bold text-liflowGreen hover:underline">Lihat Semua</button>
          </div>
          <div id="dash-task-list" class="space-y-2"></div>
        </div>

        <!-- Habits Summary -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-100 shadow-xs app-card">
          <div class="flex justify-between items-center mb-3 sm:mb-4">
            <span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest">Habit Aktif</span>
            <button onclick="appNav('habits')" class="text-[10px] font-bold text-liflowGreen hover:underline">Lihat Semua</button>
          </div>
          <div id="dash-habit-list" class="space-y-2"></div>
        </div>
      </div>

      <!-- Quick Actions -->
      <div>
        <h3 class="text-xs font-bold text-stone-400 uppercase tracking-widest mb-3 sm:mb-4">Aksi Cepat</h3>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4">
          <button onclick="appNav('focus')" class="bg-white border border-stone-100 rounded-2xl p-4 sm:p-5 text-left hover:border-liflowGreen hover:shadow-md transition group app-card">
            <div class="w-9 h-9 sm:w-10 sm:h-10 bg-emerald-50 rounded-xl flex items-center justify-center text-lg sm:text-xl mb-2 sm:mb-3 group-hover:scale-110 transition">⏱️</div>
            <span class="text-xs sm:text-sm font-bold text-stone-800 block">Mulai Fokus</span>
            <span class="text-[9px] sm:text-[10px] text-stone-400">Pomodoro Timer</span>
          </button>
          <button onclick="appNav('planner')" class="bg-white border border-stone-100 rounded-2xl p-4 sm:p-5 text-left hover:border-liflowBlue hover:shadow-md transition group app-card">
            <div class="w-9 h-9 sm:w-10 sm:h-10 bg-sky-50 rounded-xl flex items-center justify-center text-lg sm:text-xl mb-2 sm:mb-3 group-hover:scale-110 transition">📋</div>
            <span class="text-xs sm:text-sm font-bold text-stone-800 block">Tambah Tugas</span>
            <span class="text-[9px] sm:text-[10px] text-stone-400">Daily Planner</span>
          </button>
          <button onclick="appNav('money')" class="bg-white border border-stone-100 rounded-2xl p-4 sm:p-5 text-left hover:border-amber-300 hover:shadow-md transition group app-card">
            <div class="w-9 h-9 sm:w-10 sm:h-10 bg-amber-50 rounded-xl flex items-center justify-center text-lg sm:text-xl mb-2 sm:mb-3 group-hover:scale-110 transition">💰</div>
            <span class="text-xs sm:text-sm font-bold text-stone-800 block">Catat Transaksi</span>
            <span class="text-[9px] sm:text-[10px] text-stone-400">Money Tracker</span>
          </button>
          <button onclick="appNav('reflection')" class="bg-white border border-stone-100 rounded-2xl p-4 sm:p-5 text-left hover:border-liflowPurple hover:shadow-md transition group app-card">
            <div class="w-9 h-9 sm:w-10 sm:h-10 bg-purple-50 rounded-xl flex items-center justify-center text-lg sm:text-xl mb-2 sm:mb-3 group-hover:scale-110 transition">🌙</div>
            <span class="text-xs sm:text-sm font-bold text-stone-800 block">Refleksi Malam</span>
            <span class="text-[9px] sm:text-[10px] text-stone-400">Daily Reflection</span>
          </button>
        </div>
      </div>

      <!-- Budget Summary -->
      <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-100 shadow-xs">
        <div class="flex justify-between items-center mb-3 sm:mb-4">
          <span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest">Budget Hari Ini</span>
          <button onclick="appNav('money')" class="text-[10px] font-bold text-liflowGreen hover:underline">Lihat Semua</button>
        </div>
        <div id="dash-budget-summary" class="grid grid-cols-3 gap-2 sm:gap-4 text-center">
          <div class="bg-rose-50 p-2.5 sm:p-4 rounded-2xl">
            <span class="text-[9px] sm:text-xs text-stone-500 block mb-0.5 sm:mb-1 truncate">Pengeluaran</span>
            <span id="dash-expense" class="text-xs sm:text-base md:text-lg font-extrabold text-rose-500 truncate block">Rp 0</span>
          </div>
          <div class="bg-emerald-50 p-2.5 sm:p-4 rounded-2xl">
            <span class="text-[9px] sm:text-xs text-stone-500 block mb-0.5 sm:mb-1 truncate">Pemasukan</span>
            <span id="dash-income" class="text-xs sm:text-base md:text-lg font-extrabold text-emerald-600 truncate block">Rp 0</span>
          </div>
          <div class="bg-stone-50 p-2.5 sm:p-4 rounded-2xl">
            <span class="text-[9px] sm:text-xs text-stone-500 block mb-0.5 sm:mb-1 truncate">Saldo</span>
            <span id="dash-balance" class="text-xs sm:text-base md:text-lg font-extrabold text-stone-800 truncate block">Rp 0</span>
          </div>
        </div>
      </div>
    </section>

    <!-- ── 2. DAILY PLANNER ──────────────────────────────── -->
    <section id="sec-planner" class="app-section hidden-section p-4 sm:p-6 lg:p-8 space-y-4 sm:space-y-6">
      <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-100 shadow-xs">
        <h3 class="font-bold text-stone-900 mb-4 text-sm sm:text-base">Tambah Tugas Baru</h3>
        <div class="flex flex-col sm:flex-row gap-2.5 sm:gap-3">
          <input type="text" id="new-task-text" placeholder="Nama tugas..." class="flex-1 bg-stone-50 border border-stone-200 rounded-xl px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-liflowGreen/30">
          <div class="flex gap-2">
            <select id="new-task-priority" class="flex-1 sm:flex-none bg-stone-50 border border-stone-200 rounded-xl px-3 py-2.5 text-xs sm:text-sm outline-none">
              <option value="High">🔴 High</option>
              <option value="Medium" selected>🟡 Medium</option>
              <option value="Low">🟢 Low</option>
            </select>
            <select id="new-task-category" class="flex-1 sm:flex-none bg-stone-50 border border-stone-200 rounded-xl px-3 py-2.5 text-xs sm:text-sm outline-none">
              <option>Productivity</option>
              <option>Health</option>
              <option>Learning</option>
              <option>Finance</option>
              <option>Personal</option>
            </select>
            <button onclick="addTask()" class="bg-liflowGreen hover:bg-stone-700 text-white text-xs sm:text-sm font-bold px-4 sm:px-6 py-2.5 rounded-xl transition shadow-sm whitespace-nowrap">
              <i class="fa-solid fa-plus mr-1"></i> Tambah
            </button>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-100 shadow-xs">
        <div class="flex justify-between items-center mb-4 sm:mb-5">
          <h3 class="font-bold text-stone-900 text-sm sm:text-base">Agenda Hari Ini</h3>
          <span id="task-progress-label" class="text-xs font-bold text-liflowGreen bg-emerald-50 px-3 py-1 rounded-full">0/0 Selesai</span>
        </div>
        <div id="task-list" class="space-y-2.5 sm:space-y-3"></div>
      </div>
    </section>

    <!-- ── 3. HABIT TRACKER ──────────────────────────────── -->
    <section id="sec-habits" class="app-section hidden-section p-4 sm:p-6 lg:p-8 space-y-4 sm:space-y-6">
      <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-100 shadow-xs">
        <h3 class="font-bold text-stone-900 mb-4 text-sm sm:text-base">Tambah Kebiasaan Baru</h3>
        <div class="flex flex-col sm:flex-row gap-2.5 sm:gap-3">
          <input type="text" id="new-habit-name" placeholder="Nama kebiasaan... (e.g. Minum air 8 gelas)" class="flex-1 bg-stone-50 border border-stone-200 rounded-xl px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-liflowGreen/30">
          <button onclick="addHabit()" class="bg-liflowGreen hover:bg-stone-700 text-white text-xs sm:text-sm font-bold px-5 sm:px-6 py-2.5 rounded-xl transition shadow-sm whitespace-nowrap">
            <i class="fa-solid fa-plus mr-1"></i> Tambah
          </button>
        </div>
      </div>

      <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-100 shadow-xs">
        <h3 class="font-bold text-stone-900 mb-4 sm:mb-5 text-sm sm:text-base">Kebiasaan Aktif <span class="text-xs text-stone-400 font-normal ml-1 sm:ml-2">— klik untuk centang hari ini</span></h3>
        <div id="habit-list" class="space-y-2.5 sm:space-y-3"></div>
      </div>
    </section>

    <!-- ── 4. MONEY TRACKER ──────────────────────────────── -->
    <section id="sec-money" class="app-section hidden-section p-4 sm:p-6 lg:p-8 space-y-4 sm:space-y-6">
      <!-- Add Transaction -->
      <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-100 shadow-xs">
        <h3 class="font-bold text-stone-900 mb-4 text-sm sm:text-base">Catat Transaksi</h3>
        <div class="flex flex-col sm:flex-row gap-2.5 sm:gap-3">
          <input type="text" id="new-tr-name" placeholder="Keterangan... (e.g. Makan siang)" class="flex-1 bg-stone-50 border border-stone-200 rounded-xl px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-liflowGreen/30">
          <div class="flex gap-2">
            <input type="number" id="new-tr-amount" placeholder="Jumlah (Rp)" class="w-32 sm:w-40 bg-stone-50 border border-stone-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:ring-2 focus:ring-liflowGreen/30">
            <select id="new-tr-type" class="bg-stone-50 border border-stone-200 rounded-xl px-3 py-2.5 text-xs sm:text-sm outline-none">
              <option value="expense">💸 Keluar</option>
              <option value="income">💰 Masuk</option>
            </select>
            <button onclick="addTransaction()" class="bg-liflowGreen hover:bg-stone-700 text-white text-xs sm:text-sm font-bold px-4 sm:px-6 py-2.5 rounded-xl transition shadow-sm whitespace-nowrap">
              <i class="fa-solid fa-plus mr-1"></i> Simpan
            </button>
          </div>
        </div>
      </div>

      <!-- Summary -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 text-center">
        <div class="bg-rose-50 border border-rose-100 p-4 sm:p-5 rounded-2xl sm:rounded-3xl">
          <span class="text-[9px] sm:text-[10px] font-bold text-stone-400 uppercase tracking-widest block mb-1">Total Pengeluaran</span>
          <span id="money-expense" class="text-xl sm:text-2xl font-extrabold text-rose-500">Rp 0</span>
        </div>
        <div class="bg-emerald-50 border border-emerald-100 p-4 sm:p-5 rounded-2xl sm:rounded-3xl">
          <span class="text-[9px] sm:text-[10px] font-bold text-stone-400 uppercase tracking-widest block mb-1">Total Pemasukan</span>
          <span id="money-income" class="text-xl sm:text-2xl font-extrabold text-emerald-600">Rp 0</span>
        </div>
        <div class="bg-white border border-stone-100 p-4 sm:p-5 rounded-2xl sm:rounded-3xl">
          <span class="text-[9px] sm:text-[10px] font-bold text-stone-400 uppercase tracking-widest block mb-1">Saldo Bersih</span>
          <span id="money-balance" class="text-xl sm:text-2xl font-extrabold text-stone-800">Rp 0</span>
        </div>
      </div>

      <!-- Transaction List -->
      <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-100 shadow-xs">
        <h3 class="font-bold text-stone-900 mb-4 sm:mb-5 text-sm sm:text-base">Riwayat Transaksi</h3>
        <div id="money-list" class="space-y-2"></div>
      </div>
    </section>

    <!-- ── 5. FOCUS MODE ─────────────────────────────────── -->
    <section id="sec-focus" class="app-section hidden-section p-4 sm:p-6 lg:p-8">
      <div class="max-w-lg mx-auto space-y-6 sm:space-y-8">
        <!-- Mode Toggle -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-100 shadow-xs">
          <h3 class="font-bold text-stone-900 mb-4 text-center text-sm sm:text-base">Pilih Mode Fokus</h3>
          <div class="flex gap-2 sm:gap-3 justify-center flex-col sm:flex-row">
            <button onclick="setFocusMode('pomodoro')" id="mode-btn-pomodoro" class="px-5 py-2.5 sm:px-6 sm:py-3 rounded-2xl text-xs sm:text-sm font-bold bg-liflowGreen text-white transition shadow-sm">⏱ Pomodoro (25 min)</button>
            <button onclick="setFocusMode('deepwork')" id="mode-btn-deepwork" class="px-5 py-2.5 sm:px-6 sm:py-3 rounded-2xl text-xs sm:text-sm font-bold bg-stone-100 text-stone-600 hover:bg-stone-200 transition">🔭 Deep Work (50 min)</button>
          </div>
        </div>

        <!-- Timer -->
        <div class="bg-white rounded-3xl p-6 sm:p-10 border border-stone-100 shadow-xs text-center">
          <div id="focus-timer-ring" class="relative w-44 h-44 sm:w-52 sm:h-52 mx-auto mb-6 sm:mb-8">
            <svg class="w-44 h-44 sm:w-52 sm:h-52" viewBox="0 0 208 208">
              <circle cx="104" cy="104" r="90" fill="none" stroke="#F5F5F4" stroke-width="10"/>
              <circle id="focus-ring-circle" cx="104" cy="104" r="90" fill="none" stroke="#7F987E" stroke-width="10"
                stroke-dasharray="565" stroke-dashoffset="0" stroke-linecap="round"
                style="transform:rotate(-90deg);transform-origin:center;transition:stroke-dashoffset 1s linear"/>
            </svg>
            <div class="absolute inset-0 flex flex-col items-center justify-center">
              <span id="focus-time-display" class="text-4xl sm:text-5xl font-black text-stone-900 tracking-tight leading-none">25:00</span>
              <span id="focus-mode-label" class="text-[10px] sm:text-xs text-stone-400 uppercase tracking-widest mt-2">Pomodoro</span>
            </div>
          </div>

          <div class="flex items-center justify-center gap-3 sm:gap-4">
            <button onclick="toggleFocusTimer()" id="focus-start-btn" class="bg-liflowGreen hover:bg-stone-700 text-white font-bold px-6 sm:px-8 py-3 sm:py-3.5 rounded-2xl text-xs sm:text-sm transition shadow-md">
              <i class="fa-solid fa-play mr-2"></i> Mulai Sesi
            </button>
            <button onclick="resetFocusTimer()" class="bg-stone-100 hover:bg-stone-200 text-stone-600 font-bold px-5 sm:px-6 py-3 sm:py-3.5 rounded-2xl text-xs sm:text-sm transition">
              <i class="fa-solid fa-rotate-left mr-1"></i> Reset
            </button>
          </div>

          <p id="focus-session-count" class="text-xs text-stone-400 mt-4">Sesi selesai hari ini: <span id="focus-count" class="font-bold text-stone-700">0</span></p>
        </div>

        <!-- Focus Tips -->
        <div class="bg-gradient-to-br from-liflowGreen/10 to-liflowBlue/10 rounded-3xl p-5 sm:p-6 border border-liflowGreen/20">
          <h4 class="font-bold text-stone-900 text-sm mb-3">💡 Tips Fokus</h4>
          <ul class="space-y-2 text-xs text-stone-600 font-light">
            <li>🎧 Gunakan noise-cancelling headphone atau white noise</li>
            <li>📵 Aktifkan Do Not Disturb di ponselmu</li>
            <li>💧 Siapkan air minum sebelum memulai sesi</li>
            <li>✅ Definisikan 1 tugas utama yang ingin diselesaikan</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- ── 6. DAILY REFLECTION ───────────────────────────── -->
    <section id="sec-reflection" class="app-section hidden-section p-4 sm:p-6 lg:p-8 max-w-2xl mx-auto space-y-4 sm:space-y-6">
      <div class="bg-white rounded-3xl p-5 sm:p-8 border border-stone-100 shadow-xs space-y-5 sm:space-y-6">
        <div class="text-center">
          <h3 class="font-serif font-bold text-stone-900 text-lg sm:text-xl">Bagaimana harimu hari ini?</h3>
          <p class="text-xs text-stone-400 mt-1">Evaluasi singkat sebelum beristirahat</p>
        </div>

        <!-- Mood Selector -->
        <div>
          <label class="text-[10px] font-bold text-stone-400 uppercase tracking-widest block mb-3 text-center sm:text-left">Mood Hari Ini</label>
          <div class="flex justify-center gap-3 sm:gap-4 flex-wrap">
            <button onclick="selectMood('😢')" class="mood-btn text-2xl sm:text-3xl" title="Sangat Tidak Baik">😢</button>
            <button onclick="selectMood('🙁')" class="mood-btn text-2xl sm:text-3xl" title="Tidak Baik">🙁</button>
            <button onclick="selectMood('😐')" class="mood-btn text-2xl sm:text-3xl" title="Biasa">😐</button>
            <button onclick="selectMood('🙂')" class="mood-btn text-2xl sm:text-3xl selected" title="Baik">🙂</button>
            <button onclick="selectMood('🤩')" class="mood-btn text-2xl sm:text-3xl" title="Luar Biasa">🤩</button>
          </div>
        </div>

        <!-- Reflection Fields -->
        <div class="space-y-4">
          <div>
            <label class="text-[10px] font-bold text-stone-400 uppercase tracking-widest block mb-2">Pencapaian Terbesar Hari Ini</label>
            <textarea id="ref-win" rows="2" placeholder="Apa hal terbaik yang kamu capai hari ini?" class="w-full bg-stone-50 border border-stone-200 rounded-2xl px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-liflowGreen/30 resize-none font-light"></textarea>
          </div>
          <div>
            <label class="text-[10px] font-bold text-stone-400 uppercase tracking-widest block mb-2">Tantangan yang Dihadapi</label>
            <textarea id="ref-challenge" rows="2" placeholder="Apa yang terasa berat hari ini?" class="w-full bg-stone-50 border border-stone-200 rounded-2xl px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-liflowGreen/30 resize-none font-light"></textarea>
          </div>
          <div>
            <label class="text-[10px] font-bold text-stone-400 uppercase tracking-widest block mb-2">Rasa Syukur</label>
            <textarea id="ref-gratitude" rows="2" placeholder="3 hal yang kamu syukuri hari ini..." class="w-full bg-stone-50 border border-stone-200 rounded-2xl px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-liflowGreen/30 resize-none font-light"></textarea>
          </div>
        </div>

        <button onclick="saveReflection()" class="w-full bg-liflowGreen hover:bg-stone-700 text-white font-bold py-3 sm:py-3.5 rounded-2xl text-xs sm:text-sm transition shadow-md">
          Simpan Refleksi &amp; Lanjut ke Plan Tomorrow <i class="fa-solid fa-arrow-right ml-2"></i>
        </button>
      </div>
    </section>

    <!-- ── 7. PLAN TOMORROW ──────────────────────────────── -->
    <section id="sec-tomorrow" class="app-section hidden-section p-4 sm:p-6 lg:p-8 max-w-2xl mx-auto space-y-4 sm:space-y-6">
      <div class="bg-gradient-to-br from-liflowGreen/10 to-liflowBlue/10 rounded-3xl p-5 sm:p-6 border border-liflowGreen/20 text-center">
        <span class="text-2xl block mb-2">🔄</span>
        <h3 class="font-serif font-bold text-stone-900 text-lg sm:text-xl">Sambungkan Siklusmu</h3>
        <p class="text-xs text-stone-500 mt-1">Atur rencana esok hari dari sekarang agar kamu bisa beristirahat dengan tenang</p>
      </div>

      <div class="bg-white rounded-3xl p-5 sm:p-8 border border-stone-100 shadow-xs space-y-5">
        <div>
          <label class="text-[10px] font-bold text-stone-400 uppercase tracking-widest block mb-3">Fokus Utama Esok Hari</label>
          <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
            <button onclick="toggleFocusArea(this)" class="focus-area-btn p-3 rounded-2xl border text-xs font-bold text-center transition bg-purple-50 border-purple-200 text-purple-700">🎓 Kuliah</button>
            <button onclick="toggleFocusArea(this)" class="focus-area-btn p-3 rounded-2xl border text-xs font-bold text-center transition bg-stone-50 border-stone-200 text-stone-500">🏃 Sehat</button>
            <button onclick="toggleFocusArea(this)" class="focus-area-btn p-3 rounded-2xl border text-xs font-bold text-center transition bg-stone-50 border-stone-200 text-stone-500">📖 Belajar</button>
            <button onclick="toggleFocusArea(this)" class="focus-area-btn p-3 rounded-2xl border text-xs font-bold text-center transition bg-stone-50 border-stone-200 text-stone-500">💼 Kerja</button>
            <button onclick="toggleFocusArea(this)" class="focus-area-btn p-3 rounded-2xl border text-xs font-bold text-center transition bg-stone-50 border-stone-200 text-stone-500">💰 Finansial</button>
            <button onclick="toggleFocusArea(this)" class="focus-area-btn p-3 rounded-2xl border text-xs font-bold text-center transition bg-stone-50 border-stone-200 text-stone-500">🤝 Relasi</button>
            <button onclick="toggleFocusArea(this)" class="focus-area-btn p-3 rounded-2xl border text-xs font-bold text-center transition bg-stone-50 border-stone-200 text-stone-500">🧘 Diri</button>
            <button onclick="toggleFocusArea(this)" class="focus-area-btn p-3 rounded-2xl border text-xs font-bold text-center transition bg-stone-50 border-stone-200 text-stone-500">🎨 Kreatif</button>
          </div>
        </div>

        <div>
          <label class="text-[10px] font-bold text-stone-400 uppercase tracking-widest block mb-2">Aktivitas Utama Esok</label>
          <textarea id="tomorrow-plan" rows="3" placeholder="Tulis 1-3 hal yang paling penting untuk dikerjakan besok..." class="w-full bg-stone-50 border border-stone-200 rounded-2xl px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-liflowGreen/30 resize-none font-light"></textarea>
        </div>

        <div>
          <label class="text-[10px] font-bold text-stone-400 uppercase tracking-widest block mb-2">Target Bangun Pagi</label>
          <input type="time" id="tomorrow-wake" value="06:00" class="bg-stone-50 border border-stone-200 rounded-xl px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-liflowGreen/30">
        </div>

        <button onclick="saveTomorrowPlan()" class="w-full bg-stone-900 hover:bg-liflowGreen text-white font-bold py-3.5 rounded-2xl text-xs sm:text-sm transition shadow-md">
          <i class="fa-solid fa-moon mr-2"></i> Simpan &amp; Istirahat dengan Tenang
        </button>
      </div>
    </section>

    <!-- ── 8. PROGRESS & ANALYTICS ───────────────────────── -->
    <section id="sec-progress" class="app-section hidden-section p-4 sm:p-6 lg:p-8 space-y-4 sm:space-y-6">
      <div class="grid md:grid-cols-2 gap-4 sm:gap-6">
        <!-- Life Score History -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-100 shadow-xs">
          <h3 class="font-bold text-stone-900 mb-1 text-sm sm:text-base">Life Score</h3>
          <p class="text-xs text-stone-400 mb-6">Rata-rata keseimbangan hidupmu</p>
          <div class="flex items-center justify-center">
            <div class="relative w-36 h-36 sm:w-40 sm:h-40">
              <svg class="w-36 h-36 sm:w-40 sm:h-40" viewBox="0 0 160 160">
                <circle cx="80" cy="80" r="65" fill="none" stroke="#F5F5F4" stroke-width="10"/>
                <circle cx="80" cy="80" r="65" fill="none" stroke="#7F987E" stroke-width="10"
                  stroke-dasharray="408" stroke-dashoffset="81" stroke-linecap="round"
                  style="transform:rotate(-90deg);transform-origin:center;transition:stroke-dashoffset 1.5s ease"/>
              </svg>
              <div class="absolute inset-0 flex flex-col items-center justify-center">
                <span class="text-3xl sm:text-4xl font-extrabold text-stone-900">86</span>
                <span class="text-[9px] text-stone-400 uppercase tracking-widest">Score</span>
              </div>
            </div>
          </div>
        </div>

        <!-- 6 Pillars -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-100 shadow-xs">
          <h3 class="font-bold text-stone-900 mb-1 text-sm sm:text-base">6 Pilar Kehidupan</h3>
          <p class="text-xs text-stone-400 mb-4 sm:mb-5">Keseimbangan hidup minggu ini</p>
          <div id="progress-pillars" class="space-y-3"></div>
        </div>
      </div>

      <!-- Streak Records -->
      <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-100 shadow-xs">
        <h3 class="font-bold text-stone-900 mb-4 sm:mb-5 text-sm sm:text-base">🔥 Rekor Streak Habit</h3>
        <div id="progress-streaks" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4"></div>
      </div>
    </section>

    <!-- ── 9. PROFILE ────────────────────────────────────── -->
    <section id="sec-profile" class="app-section hidden-section p-4 sm:p-6 lg:p-8 max-w-2xl mx-auto space-y-4 sm:space-y-6">
      <!-- User Card -->
      <div class="bg-white rounded-3xl p-6 sm:p-8 border border-stone-100 shadow-xs text-center">
        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-liflowGreen/20 border-2 border-liflowGreen/30 flex items-center justify-center font-black text-2xl sm:text-3xl text-liflowGreen mx-auto mb-3 sm:mb-4">
          <?= strtoupper(substr($_SESSION['username'] ?? 'U', 0, 1)) ?>
        </div>
        <h3 class="font-serif font-bold text-stone-900 text-xl sm:text-2xl"><?= htmlspecialchars($_SESSION['username'] ?? '') ?></h3>
        <p class="text-xs sm:text-sm text-stone-400 mt-1"><?= htmlspecialchars($_SESSION['email'] ?? '') ?></p>
        
        <?php if (!empty($_SESSION['is_premium'])): ?>
          <div class="inline-flex items-center gap-2 mt-3 px-3.5 py-1 bg-emerald-50 rounded-full text-xs font-bold text-liflowGreen border border-emerald-200">
            <span class="w-1.5 h-1.5 rounded-full bg-liflowGreen animate-pulse"></span> LIFLOW Premium Member
          </div>
          <?php if (!empty($_SESSION['premium_expires'])): ?>
            <p class="text-[10px] text-stone-400 mt-1 font-light">Masa aktif: s/d <?= htmlspecialchars($_SESSION['premium_expires']) ?></p>
          <?php endif; ?>
        <?php else: ?>
          <div class="inline-flex items-center gap-2 mt-3 px-3 py-1 bg-stone-100 rounded-full text-xs font-bold text-stone-600 border border-stone-200">
            <span>Paket: Free</span>
          </div>
          <div class="mt-4 pt-3 border-t border-stone-100 flex flex-col items-center gap-2">
            <p class="text-xs text-stone-600 font-light">Buka fitur Tomorrow Planning, Money Tracker &amp; Analytics tanpa batas:</p>
            <button type="button" onclick="openMidtransModal('monthly')" class="px-5 py-2.5 bg-[#25D366] hover:bg-[#20BD5A] text-white rounded-xl text-xs font-bold uppercase tracking-wider transition shadow-md flex items-center gap-1.5">
              <i class="fa-solid fa-crown text-amber-300"></i>
              <span>Aktifkan Premium (Mulai Rp 15.000)</span>
            </button>
          </div>
        <?php endif; ?>
      </div>

      <!-- Stats -->
      <div class="grid grid-cols-3 gap-2 sm:gap-4 text-center">
        <div class="bg-white border border-stone-100 p-3 sm:p-5 rounded-2xl shadow-xs">
          <span class="text-xl sm:text-2xl font-extrabold text-liflowGreen block">86</span>
          <span class="text-[8px] sm:text-[10px] text-stone-400 block mt-1 font-bold uppercase tracking-widest truncate">Life Score</span>
        </div>
        <div class="bg-white border border-stone-100 p-3 sm:p-5 rounded-2xl shadow-xs">
          <span id="profile-streak" class="text-xl sm:text-2xl font-extrabold text-amber-500 block">7</span>
          <span class="text-[8px] sm:text-[10px] text-stone-400 block mt-1 font-bold uppercase tracking-widest truncate">Streak Tertinggi</span>
        </div>
        <div class="bg-white border border-stone-100 p-3 sm:p-5 rounded-2xl shadow-xs">
          <span id="profile-tasks-done" class="text-xl sm:text-2xl font-extrabold text-liflowBlue block">0</span>
          <span class="text-[8px] sm:text-[10px] text-stone-400 block mt-1 font-bold uppercase tracking-widest truncate">Tugas Selesai</span>
        </div>
      </div>

      <!-- WhatsApp Help & Support Card -->
      <div class="bg-gradient-to-br from-emerald-50 via-white to-teal-50 rounded-3xl p-5 sm:p-6 border border-emerald-200/70 shadow-xs space-y-3.5">
        <div class="flex items-center justify-between">
          <div class="flex items-center gap-3">
            <div class="w-11 h-11 rounded-2xl bg-[#25D366] text-white flex items-center justify-center text-2xl shadow-md shrink-0">
              <i class="fa-brands fa-whatsapp"></i>
            </div>
            <div>
              <h4 class="font-bold text-stone-900 text-sm sm:text-base">WhatsApp Support Resmi</h4>
              <p class="text-xs text-stone-500">Nomor Kontak: <strong class="text-emerald-700 font-semibold"><?= htmlspecialchars(defined('WHATSAPP_DISPLAY') ? WHATSAPP_DISPLAY : '0857-4254-6223') ?></strong></p>
            </div>
          </div>
          <span class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-100/80 text-emerald-800 text-[10px] font-bold rounded-full">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Online
          </span>
        </div>
        <p class="text-xs text-stone-600 leading-relaxed font-light">
          Butuh bantuan sinkronisasi database lokal, konsultasi template habit, atau pertanyaan terkait akun Anda? Hubungi customer support kami langsung via WhatsApp.
        </p>
        <div class="flex flex-wrap gap-2.5 pt-1">
          <a href="<?= get_whatsapp_url('Halo LIFLOW Support, saya butuh bantuan terkait akun dashboard saya.') ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-[#25D366] hover:bg-[#20BD5A] text-white text-xs font-bold uppercase tracking-wider rounded-xl transition shadow-md hover:shadow-lg">
            <i class="fa-brands fa-whatsapp text-sm"></i> Chat CS WhatsApp
          </a>
          <button type="button" onclick="toggleWhatsAppWidget(true)" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-white hover:bg-stone-50 text-stone-700 border border-stone-200 text-xs font-bold rounded-xl transition shadow-xs">
            <i class="fa-regular fa-comment-dots text-sm text-emerald-600"></i> Buka Widget Chat
          </button>
        </div>
      </div>

      <!-- Settings -->
      <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-100 shadow-xs space-y-4">
        <h4 class="font-bold text-stone-900 text-sm sm:text-base">Pengaturan Akun</h4>
        <div class="space-y-2 text-xs sm:text-sm">
          <div class="flex justify-between items-center p-3 rounded-xl bg-stone-50">
            <span class="text-stone-600 font-medium">Username</span>
            <span class="font-bold text-stone-900"><?= htmlspecialchars($_SESSION['username'] ?? '') ?></span>
          </div>
          <div class="flex justify-between items-center p-3 rounded-xl bg-stone-50">
            <span class="text-stone-600 font-medium">Email</span>
            <span class="font-bold text-stone-900"><?= htmlspecialchars($_SESSION['email'] ?? '') ?></span>
          </div>
          <div class="flex justify-between items-center p-3 rounded-xl bg-stone-50">
            <span class="text-stone-600 font-medium">Versi Sistem</span>
            <span class="font-mono text-stone-900 font-bold">v2.0 (WAMP)</span>
          </div>
        </div>
        <button onclick="handleLogout()" class="w-full flex items-center justify-center gap-2 py-3 rounded-xl border border-rose-200 text-rose-500 text-xs sm:text-sm font-bold hover:bg-rose-50 transition">
          <i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar dari Akun
        </button>
      </div>
    </section>

  </div><!-- end scrollable sections -->

  <!-- ══ MOBILE BOTTOM NAVIGATION BAR ═════════════════════════ -->
  <nav id="mobile-bottom-nav" class="lg:hidden fixed bottom-0 left-0 right-0 bg-white/95 backdrop-blur-md border-t border-stone-200/70 z-30 px-2 py-1.5 flex items-center justify-around shadow-lg">
    <button onclick="appNav('dashboard')" id="bnav-dashboard" class="bnav-item flex flex-col items-center justify-center py-1 px-2 rounded-xl text-liflowGreen active flex-1 text-center transition">
      <i class="fa-solid fa-house text-sm sm:text-base mb-0.5"></i>
      <span class="text-[9px] font-semibold tracking-tight">Utama</span>
    </button>
    <button onclick="appNav('planner')" id="bnav-planner" class="bnav-item flex flex-col items-center justify-center py-1 px-2 rounded-xl text-stone-500 flex-1 text-center transition">
      <i class="fa-regular fa-calendar-check text-sm sm:text-base mb-0.5"></i>
      <span class="text-[9px] font-medium tracking-tight">Planner</span>
    </button>
    <button onclick="appNav('habits')" id="bnav-habits" class="bnav-item flex flex-col items-center justify-center py-1 px-2 rounded-xl text-stone-500 flex-1 text-center transition">
      <i class="fa-solid fa-fire text-sm sm:text-base mb-0.5"></i>
      <span class="text-[9px] font-medium tracking-tight">Habit</span>
    </button>
    <button onclick="appNav('money')" id="bnav-money" class="bnav-item flex flex-col items-center justify-center py-1 px-2 rounded-xl text-stone-500 flex-1 text-center transition">
      <i class="fa-solid fa-wallet text-sm sm:text-base mb-0.5"></i>
      <span class="text-[9px] font-medium tracking-tight">Money</span>
    </button>
    <button onclick="toggleSidebar(true)" id="bnav-menu" class="bnav-item flex flex-col items-center justify-center py-1 px-2 rounded-xl text-stone-500 flex-1 text-center transition">
      <i class="fa-solid fa-bars-staggered text-sm sm:text-base mb-0.5"></i>
      <span class="text-[9px] font-medium tracking-tight">Menu</span>
    </button>
  </nav>

</main>
