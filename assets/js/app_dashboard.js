/**
 * ========================================================
 * LIFLOW App Dashboard — Interactive Script
 * Handles all functionality for authenticated users:
 * - Sidebar navigation & Topbar
 * - Daily Planner (Add, Complete, Delete)
 * - Habit Tracker (Add, Streak, Check)
 * - Money Tracker (Add, Delete, Calculation)
 * - Focus Mode (Pomodoro, Deep Work Timer with SVG ring)
 * - Reflection & Tomorrow planning
 * - Analytics & Life Score computation
 * - State persistence to MySQL / Session
 * ========================================================
 */

// Global Dashboard State
const appState = {
  currentView: 'dashboard',
  lifeScore: 86,
  tasks: [
    { id: 1, text: 'Selesaikan Desain UI Liflow', category: 'Productivity', priority: 'High', completed: true },
    { id: 2, text: 'Meeting Evaluasi Proyek', category: 'Productivity', priority: 'Medium', completed: false },
    { id: 3, text: 'Olahraga Sore 30 Menit', category: 'Health', priority: 'Medium', completed: false },
    { id: 4, text: 'Review Anggaran Bulanan', category: 'Finance', priority: 'Low', completed: true },
  ],
  habits: [
    { id: 1, name: 'Minum air 8 gelas', streak: 7, doneToday: true },
    { id: 2, name: 'Olahraga 30 menit', streak: 5, doneToday: false },
    { id: 3, name: 'Baca buku 15 menit', streak: 3, doneToday: false },
    { id: 4, name: 'Tidur sebelum 23.00', streak: 6, doneToday: true },
  ],
  transactions: [
    { id: 1, name: 'Makan Siang & Kopi', amount: 35000, type: 'expense' },
    { id: 2, name: 'Transportasi Umum', amount: 15000, type: 'expense' },
    { id: 3, name: 'Project Freelance UI', amount: 450000, type: 'income' },
    { id: 4, name: 'Langganan Buku Digital', amount: 65000, type: 'expense' },
  ],
  reflection: {
    mood: '🙂',
    win: 'Menyelesaikan modul aplikasi Liflow',
    challenge: 'Membagi waktu antara tugas utama dan riset',
    gratitude: 'Keluarga yang suportif, kesehatan yang prima, dan secangkir teh hangat',
  },
  tomorrow: {
    focusArea: 'Kuliah',
    plan: 'Fokus sesi kuliah pagi dan menyelesaikan bab kedua laporan.',
    wakeTime: '06:00',
  },
  focus: {
    mode: 'pomodoro',
    durationMinutes: 25,
    minutes: 25,
    seconds: 0,
    isRunning: false,
    interval: null,
    completedSessions: 2,
  },
  pillars: [
    { name: 'Productivity', score: 85, color: '#7F987E' },
    { name: 'Health', score: 78, color: '#7BBCE6' },
    { name: 'Mindfulness', score: 90, color: '#C2B2F0' },
    { name: 'Finance', score: 82, color: '#FCD385' },
    { name: 'Learning', score: 70, color: '#E879F9' },
    { name: 'Relations', score: 88, color: '#34D399' },
  ]
};

// ────────────────────────────────────────────────────────
// NAVIGATION ENGINE
// ────────────────────────────────────────────────────────
const viewMeta = {
  dashboard:  { title: 'Dashboard Utama', sub: 'Ringkasan keseimbangan dan agenda harimu 🌿' },
  planner:    { title: 'Daily Planner', sub: 'Rencanakan dan tuntaskan target produktivitasmu' },
  habits:     { title: 'Habit Tracker', sub: 'Bangun konsistensi dan pantau streak harianmu' },
  money:      { title: 'Money Tracker', sub: 'Pantau arus kas, pengeluaran, dan tabungan' },
  focus:      { title: 'Focus Mode', sub: 'Tingkatkan konsentrasi tanpa distraksi' },
  reflection: { title: 'Daily Reflection', sub: 'Luangkan 5 menit sebelum tidur untuk mengevaluasi hari' },
  tomorrow:   { title: 'Plan Tomorrow', sub: 'Siklus hidup terhubung — persiapkan esok dari sekarang' },
  progress:   { title: 'Progress & Analytics', sub: 'Statistik holistik dan keseimbangan 6 pilar kehidupan' },
  profile:    { title: 'Profil Akun', sub: 'Informasi akun dan preferensi LIFLOW' },
};

function appNav(viewId) {
  if (!viewMeta[viewId]) return;
  appState.currentView = viewId;

  // Toggle active button in sidebar
  document.querySelectorAll('#app-sidebar .nav-item').forEach(btn => {
    btn.classList.remove('active', 'text-liflowGreen', 'font-semibold', 'bg-emerald-50/60');
    btn.classList.add('text-stone-600', 'font-medium');
  });

  const activeBtn = document.getElementById(`nav-${viewId}`);
  if (activeBtn) {
    activeBtn.classList.add('active', 'text-liflowGreen', 'font-semibold', 'bg-emerald-50/60');
    activeBtn.classList.remove('text-stone-600', 'font-medium');
  }

  // Toggle active section
  document.querySelectorAll('.app-section').forEach(sec => {
    sec.classList.remove('active-section');
    sec.classList.add('hidden-section');
    sec.style.display = 'none';
  });

  const targetSec = document.getElementById(`sec-${viewId}`);
  if (targetSec) {
    targetSec.classList.add('active-section');
    targetSec.classList.remove('hidden-section');
    targetSec.style.display = 'block';
  }

  // Update Topbar
  const titleEl = document.getElementById('app-page-title');
  const subEl = document.getElementById('app-page-sub');
  if (titleEl) titleEl.innerText = viewMeta[viewId].title;
  if (subEl) subEl.innerText = viewMeta[viewId].sub;

  // Scroll to top of content container
  const scrollContainer = document.querySelector('main > div');
  if (scrollContainer) scrollContainer.scrollTop = 0;
}

// ────────────────────────────────────────────────────────
// DATA FORMATTERS & HELPERS
// ────────────────────────────────────────────────────────
function formatRupiah(number) {
  return 'Rp ' + Number(number).toLocaleString('id-ID');
}

function updateDateDisplay() {
  const dateEl = document.getElementById('app-date');
  if (dateEl) {
    const now = new Date();
    const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
    dateEl.innerText = now.toLocaleDateString('id-ID', options);
  }
}

// ────────────────────────────────────────────────────────
// LIFE SCORE CALCULATOR
// ────────────────────────────────────────────────────────
function calculateLifeScore() {
  const taskCompletion = appState.tasks.length > 0 
    ? (appState.tasks.filter(t => t.completed).length / appState.tasks.length) * 40
    : 30;

  const habitCount = appState.habits.length > 0 
    ? (appState.habits.filter(h => h.doneToday).length / appState.habits.length) * 35
    : 25;

  const expense = appState.transactions.filter(t => t.type === 'expense').reduce((sum, t) => sum + t.amount, 0);
  const income = appState.transactions.filter(t => t.type === 'income').reduce((sum, t) => sum + t.amount, 0);
  const moneyHealth = income > 0 ? Math.min(25, (1 - (expense / income)) * 25 + 15) : 20;

  const totalScore = Math.min(99, Math.max(40, Math.round(taskCompletion + habitCount + moneyHealth)));
  appState.lifeScore = totalScore;

  // Update DOM widgets
  const scoreEls = ['dash-score', 'dash-score-label'];
  scoreEls.forEach(id => {
    const el = document.getElementById(id);
    if (el) el.innerText = totalScore;
  });

  return totalScore;
}

// ────────────────────────────────────────────────────────
// TASKS (DAILY PLANNER)
// ────────────────────────────────────────────────────────
function renderTasks() {
  const listEl = document.getElementById('task-list');
  const dashListEl = document.getElementById('dash-task-list');
  const countDone = appState.tasks.filter(t => t.completed).length;
  const countTotal = appState.tasks.length;

  const labelEl = document.getElementById('task-progress-label');
  if (labelEl) labelEl.innerText = `${countDone}/${countTotal} Selesai`;

  const profileDoneEl = document.getElementById('profile-tasks-done');
  if (profileDoneEl) profileDoneEl.innerText = countDone;

  // Render Full Planner List
  if (listEl) {
    if (appState.tasks.length === 0) {
      listEl.innerHTML = `<p class="text-stone-400 text-xs italic py-4 text-center">Belum ada tugas hari ini. Rencanakan sekarang!</p>`;
    } else {
      listEl.innerHTML = appState.tasks.map(t => `
        <div class="flex items-center justify-between p-3.5 rounded-2xl border transition-all ${t.completed ? 'bg-stone-50/70 border-stone-200/60 opacity-60' : 'bg-white border-stone-100 hover:border-liflowGreen/40 shadow-xs'}">
          <div class="flex items-center gap-3.5 flex-1 min-w-0">
            <button onclick="toggleTask(${t.id})" class="w-6 h-6 rounded-lg border flex items-center justify-center transition-all ${t.completed ? 'bg-liflowGreen border-liflowGreen text-white' : 'border-stone-300 hover:border-liflowGreen bg-white'}">
              ${t.completed ? '<i class="fa-solid fa-check text-xs"></i>' : ''}
            </button>
            <span class="text-xs font-medium text-stone-800 truncate ${t.completed ? 'line-through text-stone-400' : ''}">${escapeHtml(t.text)}</span>
          </div>
          <div class="flex items-center gap-2 shrink-0">
            <span class="text-[10px] px-2.5 py-0.5 rounded-full font-semibold ${t.priority === 'High' ? 'bg-rose-50 text-rose-600 border border-rose-200' : t.priority === 'Medium' ? 'bg-amber-50 text-amber-600 border border-amber-200' : 'bg-emerald-50 text-emerald-600 border border-emerald-200'}">${t.priority}</span>
            <span class="text-[10px] text-stone-400 font-medium hidden sm:inline px-2 py-0.5 bg-stone-100 rounded-md">${t.category}</span>
            <button onclick="deleteTask(${t.id})" class="w-7 h-7 rounded-lg text-stone-300 hover:text-rose-500 hover:bg-rose-50 transition flex items-center justify-center">
              <i class="fa-regular fa-trash-can text-xs"></i>
            </button>
          </div>
        </div>
      `).join('');
    }
  }

  // Render Dashboard Preview (Max 3)
  if (dashListEl) {
    const preview = appState.tasks.slice(0, 3);
    if (preview.length === 0) {
      dashListEl.innerHTML = `<p class="text-[11px] text-stone-400 italic py-2">Semua tugas beres ✨</p>`;
    } else {
      dashListEl.innerHTML = preview.map(t => `
        <div class="flex items-center justify-between text-xs py-1.5 border-b border-stone-50 last:border-none">
          <div class="flex items-center gap-2 truncate">
            <button onclick="toggleTask(${t.id})" class="w-4 h-4 rounded border flex items-center justify-center shrink-0 ${t.completed ? 'bg-liflowGreen border-liflowGreen text-white text-[9px]' : 'border-stone-300'}">
              ${t.completed ? '<i class="fa-solid fa-check"></i>' : ''}
            </button>
            <span class="truncate ${t.completed ? 'line-through text-stone-400' : 'text-stone-700'}">${escapeHtml(t.text)}</span>
          </div>
          <span class="text-[9px] px-2 py-0.5 rounded font-bold shrink-0 ${t.priority === 'High' ? 'text-rose-600 bg-rose-50' : 'text-stone-500 bg-stone-100'}">${t.priority}</span>
        </div>
      `).join('');
    }
  }

  calculateLifeScore();
}

function addTask() {
  const textInput = document.getElementById('new-task-text');
  const prioInput = document.getElementById('new-task-priority');
  const catInput  = document.getElementById('new-task-category');

  if (!textInput || !textInput.value.trim()) {
    showToast('Tuliskan nama tugas terlebih dahulu.', 'warning');
    return;
  }

  const newTask = {
    id: Date.now(),
    text: textInput.value.trim(),
    priority: prioInput ? prioInput.value : 'Medium',
    category: catInput ? catInput.value : 'Productivity',
    completed: false,
  };

  appState.tasks.unshift(newTask);
  textInput.value = '';
  renderTasks();
  syncDashboardState();
  showToast('Tugas baru berhasil ditambahkan! 🌿', 'success');
}

function toggleTask(id) {
  const t = appState.tasks.find(item => item.id === id);
  if (t) {
    t.completed = !t.completed;
    renderTasks();
    syncDashboardState();
    showToast(t.completed ? 'Target diselesaikan! Hebat ✨' : 'Target diaktifkan kembali.', 'info');
  }
}

function deleteTask(id) {
  appState.tasks = appState.tasks.filter(t => t.id !== id);
  renderTasks();
  syncDashboardState();
  showToast('Tugas dihapus.', 'info');
}

// ────────────────────────────────────────────────────────
// HABITS
// ────────────────────────────────────────────────────────
function renderHabits() {
  const listEl = document.getElementById('habit-list');
  const dashListEl = document.getElementById('dash-habit-list');
  const streakEl = document.getElementById('progress-streaks');

  let maxStreak = 0;
  appState.habits.forEach(h => {
    if (h.streak > maxStreak) maxStreak = h.streak;
  });
  const profileStreakEl = document.getElementById('profile-streak');
  if (profileStreakEl) profileStreakEl.innerText = `${maxStreak} hari`;

  // Main Habits Tab
  if (listEl) {
    if (appState.habits.length === 0) {
      listEl.innerHTML = `<p class="text-stone-400 text-xs italic py-4 text-center">Belum ada kebiasaan yang dilacak.</p>`;
    } else {
      listEl.innerHTML = appState.habits.map(h => `
        <div class="flex items-center justify-between p-4 rounded-2xl border transition-all ${h.doneToday ? 'bg-emerald-50/30 border-emerald-100' : 'bg-white border-stone-100 hover:border-liflowGreen/30 shadow-xs'}">
          <div class="flex items-center gap-3">
            <button onclick="toggleHabit(${h.id})" class="w-8 h-8 rounded-xl border flex items-center justify-center transition-all ${h.doneToday ? 'bg-liflowGreen text-white border-liflowGreen' : 'border-stone-200 text-stone-400 hover:border-liflowGreen hover:text-liflowGreen'}">
              <i class="fa-solid fa-check text-xs"></i>
            </button>
            <div>
              <span class="text-xs font-bold text-stone-800 block">${escapeHtml(h.name)}</span>
              <span class="text-[10px] text-stone-400 font-medium">${h.doneToday ? 'Sudah centang hari ini' : 'Belum dilakukan hari ini'}</span>
            </div>
          </div>
          <div class="flex items-center gap-3">
            <div class="flex items-center gap-1.5 px-3 py-1 bg-amber-50 border border-amber-200 rounded-full text-xs font-bold text-amber-600">
              <i class="fa-solid fa-fire text-amber-500"></i> ${h.streak} hari
            </div>
            <button onclick="deleteHabit(${h.id})" class="w-7 h-7 rounded-lg text-stone-300 hover:text-rose-500 hover:bg-rose-50 transition flex items-center justify-center">
              <i class="fa-regular fa-trash-can text-xs"></i>
            </button>
          </div>
        </div>
      `).join('');
    }
  }

  // Dashboard preview
  if (dashListEl) {
    dashListEl.innerHTML = appState.habits.slice(0, 3).map(h => `
      <div class="flex items-center justify-between text-xs py-1.5 border-b border-stone-50 last:border-none">
        <div class="flex items-center gap-2 truncate">
          <button onclick="toggleHabit(${h.id})" class="w-4 h-4 rounded border flex items-center justify-center shrink-0 ${h.doneToday ? 'bg-liflowGreen border-liflowGreen text-white text-[9px]' : 'border-stone-300'}">
            ${h.doneToday ? '<i class="fa-solid fa-check"></i>' : ''}
          </button>
          <span class="truncate ${h.doneToday ? 'text-stone-400 line-through' : 'text-stone-700'}">${escapeHtml(h.name)}</span>
        </div>
        <span class="text-[10px] font-bold text-amber-500 shrink-0"><i class="fa-solid fa-fire mr-0.5"></i> ${h.streak}</span>
      </div>
    `).join('');
  }

  // Analytics Streaks
  if (streakEl) {
    streakEl.innerHTML = appState.habits.map(h => `
      <div class="p-4 rounded-2xl bg-stone-50 border border-stone-100 text-center">
        <span class="text-xl block mb-1">🔥</span>
        <span class="text-xs font-bold text-stone-800 block truncate">${escapeHtml(h.name)}</span>
        <span class="text-sm font-extrabold text-amber-500 block mt-1">${h.streak} Hari Berturut</span>
      </div>
    `).join('');
  }

  calculateLifeScore();
}

function addHabit() {
  const input = document.getElementById('new-habit-name');
  if (!input || !input.value.trim()) {
    showToast('Tuliskan nama kebiasaan baru.', 'warning');
    return;
  }

  appState.habits.push({
    id: Date.now(),
    name: input.value.trim(),
    streak: 1,
    doneToday: true,
  });

  input.value = '';
  renderHabits();
  syncDashboardState();
  showToast('Habit baru ditambahkan & dicentang untuk hari ini! 🔥', 'success');
}

function toggleHabit(id) {
  const h = appState.habits.find(item => item.id === id);
  if (h) {
    h.doneToday = !h.doneToday;
    if (h.doneToday) {
      h.streak += 1;
      showToast(`🔥 Streak habit "${h.name}" naik menjadi ${h.streak} hari!`, 'success');
    } else {
      h.streak = Math.max(0, h.streak - 1);
      showToast('Centang habit dibatalkan.', 'info');
    }
    renderHabits();
    syncDashboardState();
  }
}

function deleteHabit(id) {
  appState.habits = appState.habits.filter(h => h.id !== id);
  renderHabits();
  syncDashboardState();
  showToast('Kebiasaan dihapus.', 'info');
}

// ────────────────────────────────────────────────────────
// MONEY TRACKER
// ────────────────────────────────────────────────────────
function renderMoney() {
  const listEl = document.getElementById('money-list');
  const expenseEl = document.getElementById('money-expense');
  const incomeEl  = document.getElementById('money-income');
  const balanceEl = document.getElementById('money-balance');

  const dashExpense = document.getElementById('dash-expense');
  const dashIncome  = document.getElementById('dash-income');
  const dashBalance = document.getElementById('dash-balance');

  let totalExpense = 0;
  let totalIncome  = 0;

  appState.transactions.forEach(t => {
    if (t.type === 'expense') totalExpense += Number(t.amount);
    if (t.type === 'income')  totalIncome  += Number(t.amount);
  });

  const netBalance = totalIncome - totalExpense;

  // Format strings
  const strExp = formatRupiah(totalExpense);
  const strInc = formatRupiah(totalIncome);
  const strBal = formatRupiah(netBalance);

  if (expenseEl) expenseEl.innerText = strExp;
  if (incomeEl)  incomeEl.innerText  = strInc;
  if (balanceEl) balanceEl.innerText = strBal;

  if (dashExpense) dashExpense.innerText = strExp;
  if (dashIncome)  dashIncome.innerText  = strInc;
  if (dashBalance) dashBalance.innerText = strBal;

  if (listEl) {
    if (appState.transactions.length === 0) {
      listEl.innerHTML = `<p class="text-stone-400 text-xs italic py-4 text-center">Belum ada riwayat transaksi.</p>`;
    } else {
      listEl.innerHTML = appState.transactions.map(t => `
        <div class="flex items-center justify-between p-3.5 rounded-2xl border border-stone-100 hover:border-stone-200 transition-all bg-stone-50/50">
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-xl flex items-center justify-center text-xs font-bold ${t.type === 'expense' ? 'bg-rose-100 text-rose-600' : 'bg-emerald-100 text-emerald-700'}">
              ${t.type === 'expense' ? '<i class="fa-solid fa-arrow-up text-rose-500"></i>' : '<i class="fa-solid fa-arrow-down text-emerald-600"></i>'}
            </div>
            <div>
              <span class="text-xs font-bold text-stone-800 block">${escapeHtml(t.name)}</span>
              <span class="text-[10px] text-stone-400 uppercase font-semibold">${t.type === 'expense' ? 'Pengeluaran' : 'Pemasukan'}</span>
            </div>
          </div>
          <div class="flex items-center gap-4">
            <span class="text-xs font-extrabold ${t.type === 'expense' ? 'text-rose-500' : 'text-emerald-600'}">
              ${t.type === 'expense' ? '-' : '+'}${formatRupiah(t.amount)}
            </span>
            <button onclick="deleteTransaction(${t.id})" class="w-7 h-7 rounded-lg text-stone-300 hover:text-rose-500 hover:bg-rose-50 transition flex items-center justify-center">
              <i class="fa-regular fa-trash-can text-xs"></i>
            </button>
          </div>
        </div>
      `).join('');
    }
  }

  calculateLifeScore();
}

function addTransaction() {
  const nameInput   = document.getElementById('new-tr-name');
  const amountInput = document.getElementById('new-tr-amount');
  const typeInput   = document.getElementById('new-tr-type');

  if (!nameInput || !nameInput.value.trim() || !amountInput || !amountInput.value) {
    showToast('Lengkapi keterangan dan nominal transaksi.', 'warning');
    return;
  }

  const amount = parseFloat(amountInput.value);
  if (isNaN(amount) || amount <= 0) {
    showToast('Nominal harus berupa angka valid.', 'warning');
    return;
  }

  appState.transactions.unshift({
    id: Date.now(),
    name: nameInput.value.trim(),
    amount: amount,
    type: typeInput ? typeInput.value : 'expense',
  });

  nameInput.value = '';
  amountInput.value = '';
  renderMoney();
  syncDashboardState();
  showToast('Transaksi berhasil dicatat! 💰', 'success');
}

function deleteTransaction(id) {
  appState.transactions = appState.transactions.filter(t => t.id !== id);
  renderMoney();
  syncDashboardState();
  showToast('Transaksi dihapus.', 'info');
}

// ────────────────────────────────────────────────────────
// FOCUS MODE (POMODORO)
// ────────────────────────────────────────────────────────
function setFocusMode(mode) {
  if (appState.focus.isRunning) {
    showToast('Hentikan timer terlebih dahulu sebelum berganti mode.', 'info');
    return;
  }

  appState.focus.mode = mode;
  appState.focus.durationMinutes = mode === 'pomodoro' ? 25 : 50;
  appState.focus.minutes = appState.focus.durationMinutes;
  appState.focus.seconds = 0;

  // Toggle button styles
  const btnPomo = document.getElementById('mode-btn-pomodoro');
  const btnDeep = document.getElementById('mode-btn-deepwork');
  if (mode === 'pomodoro') {
    if (btnPomo) { btnPomo.className = 'px-6 py-3 rounded-2xl text-sm font-bold bg-liflowGreen text-white transition'; }
    if (btnDeep) { btnDeep.className = 'px-6 py-3 rounded-2xl text-sm font-bold bg-stone-100 text-stone-600 transition'; }
  } else {
    if (btnPomo) { btnPomo.className = 'px-6 py-3 rounded-2xl text-sm font-bold bg-stone-100 text-stone-600 transition'; }
    if (btnDeep) { btnDeep.className = 'px-6 py-3 rounded-2xl text-sm font-bold bg-liflowGreen text-white transition'; }
  }

  const labelEl = document.getElementById('focus-mode-label');
  if (labelEl) labelEl.innerText = mode === 'pomodoro' ? 'Pomodoro' : 'Deep Work';

  updateFocusTimerDisplay();
}

function updateFocusTimerDisplay() {
  const m = String(appState.focus.minutes).padStart(2, '0');
  const s = String(appState.focus.seconds).padStart(2, '0');
  const displayEl = document.getElementById('focus-time-display');
  if (displayEl) displayEl.innerText = `${m}:${s}`;

  // Update circular SVG progress ring (circumference is ~565px for r=90)
  const totalSeconds = appState.focus.durationMinutes * 60;
  const currentSeconds = appState.focus.minutes * 60 + appState.focus.seconds;
  const fraction = (totalSeconds - currentSeconds) / totalSeconds;
  const offset = 565 * fraction;

  const circle = document.getElementById('focus-ring-circle');
  if (circle) circle.style.strokeDashoffset = offset;
}

function toggleFocusTimer() {
  const startBtn = document.getElementById('focus-start-btn');

  if (appState.focus.isRunning) {
    clearInterval(appState.focus.interval);
    appState.focus.isRunning = false;
    if (startBtn) {
      startBtn.innerHTML = '<i class="fa-solid fa-play mr-2"></i> Lanjutkan Sesi';
      startBtn.className = 'bg-liflowGreen hover:bg-stone-700 text-white font-bold px-8 py-3.5 rounded-2xl text-sm transition shadow-md';
    }
    showToast('Timer ditangguhkan.', 'info');
  } else {
    appState.focus.isRunning = true;
    if (startBtn) {
      startBtn.innerHTML = '<i class="fa-solid fa-pause mr-2"></i> Jeda Sesi';
      startBtn.className = 'bg-amber-500 hover:bg-amber-600 text-white font-bold px-8 py-3.5 rounded-2xl text-sm transition shadow-md';
    }
    showToast('Sesi fokus dimulai. Singkirkan distraksi! 🧘', 'success');

    appState.focus.interval = setInterval(() => {
      if (appState.focus.seconds === 0) {
        if (appState.focus.minutes === 0) {
          clearInterval(appState.focus.interval);
          appState.focus.isRunning = false;
          appState.focus.completedSessions += 1;
          const countEl = document.getElementById('focus-count');
          if (countEl) countEl.innerText = appState.focus.completedSessions;
          showToast('🎉 Selamat! Sesi fokus berhasil diselesaikan.', 'success');
          resetFocusTimer();
          return;
        }
        appState.focus.minutes -= 1;
        appState.focus.seconds = 59;
      } else {
        appState.focus.seconds -= 1;
      }
      updateFocusTimerDisplay();
    }, 1000);
  }
}

function resetFocusTimer() {
  clearInterval(appState.focus.interval);
  appState.focus.isRunning = false;
  appState.focus.minutes = appState.focus.durationMinutes;
  appState.focus.seconds = 0;

  const startBtn = document.getElementById('focus-start-btn');
  if (startBtn) {
    startBtn.innerHTML = '<i class="fa-solid fa-play mr-2"></i> Mulai Sesi';
    startBtn.className = 'bg-liflowGreen hover:bg-stone-700 text-white font-bold px-8 py-3.5 rounded-2xl text-sm transition shadow-md';
  }

  updateFocusTimerDisplay();
}

// ────────────────────────────────────────────────────────
// DAILY REFLECTION
// ────────────────────────────────────────────────────────
function selectMood(emoji) {
  appState.reflection.mood = emoji;
  document.querySelectorAll('.mood-btn').forEach(btn => {
    btn.classList.toggle('selected', btn.innerText.includes(emoji));
    btn.classList.toggle('scale-125', btn.innerText.includes(emoji));
  });
}

function saveReflection() {
  const winEl = document.getElementById('ref-win');
  const chEl  = document.getElementById('ref-challenge');
  const grEl  = document.getElementById('ref-gratitude');

  if (winEl) appState.reflection.win = winEl.value;
  if (chEl)  appState.reflection.challenge = chEl.value;
  if (grEl)  appState.reflection.gratitude = grEl.value;

  syncDashboardState();
  showToast('Refleksi harian tersimpan 🌿 Menghubungkan ke Plan Tomorrow...', 'success');

  setTimeout(() => {
    appNav('tomorrow');
  }, 900);
}

// ────────────────────────────────────────────────────────
// PLAN TOMORROW
// ────────────────────────────────────────────────────────
function toggleFocusArea(btn) {
  document.querySelectorAll('.focus-area-btn').forEach(b => {
    b.className = 'focus-area-btn p-3 rounded-2xl border text-xs font-bold text-center transition bg-stone-50 border-stone-200 text-stone-500';
  });
  btn.className = 'focus-area-btn p-3 rounded-2xl border text-xs font-bold text-center transition bg-purple-50 border-purple-200 text-purple-700 shadow-xs';
  appState.tomorrow.focusArea = btn.innerText;
}

function saveTomorrowPlan() {
  const planEl = document.getElementById('tomorrow-plan');
  const wakeEl = document.getElementById('tomorrow-wake');

  if (planEl) appState.tomorrow.plan = planEl.value;
  if (wakeEl) appState.tomorrow.wakeTime = wakeEl.value;

  syncDashboardState();
  showToast('Siklus berhasil disambungkan! Istirahatlah dengan tenang 🌙', 'success');

  setTimeout(() => {
    appNav('dashboard');
  }, 1000);
}

// ────────────────────────────────────────────────────────
// PROGRESS & 6 PILLARS
// ────────────────────────────────────────────────────────
function renderPillars() {
  const pillarsEl = document.getElementById('progress-pillars');
  if (!pillarsEl) return;

  pillarsEl.innerHTML = appState.pillars.map(p => `
    <div>
      <div class="flex justify-between text-xs font-bold mb-1">
        <span class="text-stone-700">${p.name}</span>
        <span class="text-stone-400">${p.score}%</span>
      </div>
      <div class="w-full bg-stone-100 rounded-full h-2 overflow-hidden">
        <div class="h-2 rounded-full transition-all duration-1000" style="width: ${p.score}%; background-color: ${p.color};"></div>
      </div>
    </div>
  `).join('');
}

// ────────────────────────────────────────────────────────
// SYNC STATE TO BACKEND
// ────────────────────────────────────────────────────────
async function syncDashboardState() {
  try {
    await fetch('api/state.php?action=save_state', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ state: appState })
    });
  } catch (err) {
    console.warn('Sync state offline fallback:', err);
  }
}

async function loadDashboardState() {
  try {
    const res = await fetch('api/state.php?action=get_state');
    const data = await res.json();
    if (data.success && data.state) {
      if (data.state.tasks)        appState.tasks        = data.state.tasks;
      if (data.state.habits)       appState.habits       = data.state.habits;
      if (data.state.transactions) appState.transactions = data.state.transactions;
      if (data.state.reflection)   appState.reflection   = data.state.reflection;
      if (data.state.tomorrow)     appState.tomorrow     = data.state.tomorrow;
      if (data.state.lifeScore)    appState.lifeScore    = data.state.lifeScore;
    }
  } catch (err) {
    console.warn('Initial load state bypassed:', err);
  }

  // Populate reflection and tomorrow inputs
  const winEl = document.getElementById('ref-win');
  const chEl  = document.getElementById('ref-challenge');
  const grEl  = document.getElementById('ref-gratitude');
  if (winEl && appState.reflection.win) winEl.value = appState.reflection.win;
  if (chEl && appState.reflection.challenge) chEl.value = appState.reflection.challenge;
  if (grEl && appState.reflection.gratitude) grEl.value = appState.reflection.gratitude;

  const planEl = document.getElementById('tomorrow-plan');
  const wakeEl = document.getElementById('tomorrow-wake');
  if (planEl && appState.tomorrow.plan) planEl.value = appState.tomorrow.plan;
  if (wakeEl && appState.tomorrow.wakeTime) wakeEl.value = appState.tomorrow.wakeTime;

  // Re-render all modules
  renderTasks();
  renderHabits();
  renderMoney();
  renderPillars();
  updateFocusTimerDisplay();
}

// ────────────────────────────────────────────────────────
// LOGOUT HANDLER
// ────────────────────────────────────────────────────────
async function handleLogout() {
  try {
    const res = await fetch('api/auth.php?action=logout');
    const data = await res.json();
    if (data.success) {
      showToast('Sesi berakhir. Sampai jumpa kembali! 🌿', 'info');
      setTimeout(() => {
        window.location.href = 'index.php';
      }, 700);
    }
  } catch (err) {
    window.location.href = 'index.php';
  }
}

// ────────────────────────────────────────────────────────
// SECURITY ESCAPE HELPER
// ────────────────────────────────────────────────────────
function escapeHtml(str) {
  if (!str) return '';
  return String(str)
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#039;');
}

// ────────────────────────────────────────────────────────
// DASHBOARD INITIALIZATION
// ────────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', async () => {
  updateDateDisplay();
  appNav('dashboard');
  await loadDashboardState();
});
