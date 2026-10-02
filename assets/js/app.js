/**
 * ========================================================
 * LIFLOW - Main Application JavaScript
 * ========================================================
 */

// ── PHP-injected runtime vars (set inline via index.php) ──
// window.LIFLOW_CONFIG = { isDbConnected, sessionUserId }

// ── Core App State ──────────────────────────────────────
const state = {
  activeTab: 'landing',
  currentSimulatedScreen: 'onboarding',
  currentAuthMode: 'login',

  isTimerRunning: false,
  focusDuration: 25,
  focusMinutes: 25,
  focusSeconds: 0,
  focusInterval: null,

  tasks: [
    { id: 1, text: 'Selesaikan Desain UI Liflow', category: 'Productivity', priority: 'High',   completed: true  },
    { id: 2, text: 'Meeting Organisasi',          category: 'Productivity', priority: 'Medium', completed: false },
    { id: 3, text: 'Olahraga 30 menit',           category: 'Health',        priority: 'Medium', completed: false },
  ],
  habits: [
    { id: 1, name: 'Minum air 8 gelas',   streak: 7 },
    { id: 2, name: 'Olahraga 30 menit',   streak: 5 },
    { id: 3, name: 'Baca buku 15 menit',  streak: 3 },
    { id: 4, name: 'Tidur sebelum 23.00', streak: 6 },
  ],
  transactions: [
    { id: 1, name: 'Makan',        amount: 25000, type: 'expense' },
    { id: 2, name: 'Transportasi', amount: 15000, type: 'expense' },
    { id: 3, name: 'Belanja',      amount: 80000, type: 'expense' },
    { id: 4, name: 'Kopi',         amount: 18000, type: 'expense' },
  ],
  currentRefMood: '🙂',
  lifeScore: 86,
};

// ── Helper: get config injected by PHP ──────────────────
function cfg(key) {
  return window.LIFLOW_CONFIG ? window.LIFLOW_CONFIG[key] : null;
}

// ══════════════════════════════════════════════════════════
// TOAST NOTIFICATION ENGINE
// ══════════════════════════════════════════════════════════
function showToast(message, type = 'success') {
  const container = document.getElementById('toast-container');
  if (!container) return;

  const toast = document.createElement('div');
  toast.className = 'flex items-center gap-3 px-4 py-3 rounded-2xl shadow-xl border text-xs font-semibold text-white pointer-events-auto bg-stone-900 border-stone-800 transition-all duration-300 transform translate-y-4 opacity-0';

  const icons = {
    success: 'fa-circle-check text-emerald-400',
    info:    'fa-circle-info text-sky-400',
    warning: 'fa-triangle-exclamation text-amber-400',
  };
  const icon = icons[type] || icons.success;

  toast.innerHTML = `<i class="fa-solid ${icon}"></i><span class="leading-tight">${message}</span>`;
  container.appendChild(toast);

  setTimeout(() => toast.classList.remove('translate-y-4', 'opacity-0'), 50);
  setTimeout(() => {
    toast.classList.add('translate-y-[-10px]', 'opacity-0');
    setTimeout(() => toast.remove(), 400);
  }, 3500);
}

// ══════════════════════════════════════════════════════════
// PAGE NAVIGATION
// ══════════════════════════════════════════════════════════
function navigateTo(targetView) {
  state.activeTab = targetView;
  const views = ['landing', 'about', 'features', 'pricing', 'blog', 'article-read'];

  views.forEach(v => {
    const el  = document.getElementById(`view-${v}`);
    const btn = document.getElementById(`nav-btn-${v}`);
    if (el)  { el.classList.add('hidden-view'); el.classList.remove('active-view'); }
    if (btn) { btn.className = v === targetView ? 'text-liflowGreen font-bold transition-all' : 'hover:text-liflowGreen transition-all'; }
  });

  const activeEl = document.getElementById(`view-${targetView}`);
  if (activeEl) { activeEl.classList.remove('hidden-view'); activeEl.classList.add('active-view'); }

  window.scrollTo({ top: 0, behavior: 'smooth' });
}

function navigateToMobile(targetView) {
  toggleMobileDrawer();
  navigateTo(targetView);
}

function toggleMobileDrawer() {
  const drawer = document.getElementById('mobile-drawer');
  if (drawer.classList.contains('hidden')) {
    drawer.classList.remove('hidden');
    setTimeout(() => drawer.classList.remove('translate-x-full'), 50);
  } else {
    drawer.classList.add('translate-x-full');
    setTimeout(() => drawer.classList.add('hidden'), 300);
  }
}

function scrollToInteractiveMockup() {
  document.getElementById('interactive-product-tour')?.scrollIntoView({ behavior: 'smooth' });
}

// ══════════════════════════════════════════════════════════
// TAB SWITCHERS
// ══════════════════════════════════════════════════════════
function _switchTab(tabIds, activeId, prefix) {
  tabIds.forEach(t => {
    const el  = document.getElementById(`${prefix}${t}`);
    const btn = document.getElementById(`${prefix}btn-${t}`);
    const active = t === activeId;
    if (el)  el.classList.toggle('hidden', !active);
    if (btn) btn.className = active
      ? 'px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider bg-white text-stone-900 shadow-sm transition'
      : 'px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-stone-400 hover:text-stone-600 transition';
  });
}

function switchServiceTab(tab) { _switchTab(['plans','bundling','faq'], tab, 'stab-'); }
function switchFeatureTab(tab) { _switchTab(['planning','wellness','finance','analytics'], tab, 'ftab-'); }

// ══════════════════════════════════════════════════════════
// FAQ ACCORDION
// ══════════════════════════════════════════════════════════
function toggleFaq(index) {
  const ans  = document.getElementById(`faq-answer-${index}`);
  const icon = document.getElementById(`faq-icon-${index}`);
  const open = ans.classList.contains('hidden');
  ans.classList.toggle('hidden', !open);
  icon.classList.toggle('rotate-180', open);
}

// ══════════════════════════════════════════════════════════
// AUTH MODAL
// ══════════════════════════════════════════════════════════
function showLeadCapture(mode) {
  document.getElementById('lead-modal').classList.remove('hidden');
  switchAuthTab(mode.toLowerCase());
}

function closeLeadCapture() {
  document.getElementById('lead-modal').classList.add('hidden');
}

function switchAuthTab(mode) {
  state.currentAuthMode = mode;
  const isRegister = mode === 'register';

  document.getElementById('tab-btn-login').className    = `flex-1 pb-3 text-center border-b-2 ${isRegister ? 'border-transparent text-stone-400' : 'border-liflowGreen text-stone-900'}`;
  document.getElementById('tab-btn-register').className = `flex-1 pb-3 text-center border-b-2 ${isRegister ? 'border-liflowGreen text-stone-900' : 'border-transparent text-stone-400'}`;
  document.getElementById('auth-group-username').classList.toggle('hidden', !isRegister);
  document.getElementById('lead-modal-title').innerText   = isRegister ? 'Daftar Akun Baru LIFLOW'       : 'Masuk ke Ruang Fokus Anda';
  document.getElementById('lead-modal-subtitle').innerText = isRegister ? 'Mulai perjalanan fokus dan hidup seimbang.' : 'Masuk ke ruang fokus dan dashboard harian Anda.';
  document.getElementById('auth-submit-label').innerText  = isRegister ? 'Buat Akun Sekarang'            : 'Konfirmasi Masuk';
}

async function handleAuthSubmit(e) {
  e.preventDefault();

  const email    = document.getElementById('auth-email').value;
  const password = document.getElementById('auth-password').value;
  const username = document.getElementById('auth-username').value;
  const isReg    = state.currentAuthMode === 'register';
  const endpoint = isReg ? 'api/auth.php?action=register' : 'api/auth.php?action=login';

  try {
    const res  = await fetch(endpoint, { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify({ email, password, username }) });
    const data = await res.json();
    if (data.success) {
      showToast(isReg ? 'Akun dibuat! Selamat datang di LIFLOW 🌿' : 'Berhasil masuk!', 'success');
      if (data.state) {
        state.tasks        = data.state.tasks        || state.tasks;
        state.habits       = data.state.habits       || state.habits;
        state.transactions = data.state.transactions || state.transactions;
        state.lifeScore    = data.state.lifeScore    || state.lifeScore;
      }
      setTimeout(() => location.reload(), 1000);
    } else {
      showToast(data.message || 'Otentikasi gagal.', 'warning');
    }
  } catch { showToast('Koneksi server gagal.', 'warning'); }
}

async function handleLogout() {
  try {
    const res  = await fetch('api/auth.php?action=logout');
    const data = await res.json();
    if (data.success) { showToast('Sesi ditutup. Jaga keseimbanganmu!', 'info'); setTimeout(() => location.reload(), 1000); }
  } catch { location.reload(); }
}

async function saveAppStateToMySQL() {
  if (!cfg('isDbConnected') || !cfg('sessionUserId')) return;
  try {
    await fetch('api/state.php?action=save_state', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify({ state }) });
  } catch (err) { console.error('Sync ke MySQL gagal:', err); }
}

async function loadUserStateFromMySQL() {
  if (!cfg('isDbConnected') || !cfg('sessionUserId')) return;
  try {
    const res  = await fetch('api/state.php?action=get_state');
    const data = await res.json();
    if (data.success && data.state) {
      state.tasks        = data.state.tasks        || state.tasks;
      state.habits       = data.state.habits       || state.habits;
      state.transactions = data.state.transactions || state.transactions;
      state.lifeScore    = data.state.lifeScore    || state.lifeScore;
    }
  } catch { console.warn('WAMP sync bypassed.'); }
}

// ══════════════════════════════════════════════════════════
// NEWSLETTER
// ══════════════════════════════════════════════════════════
function handleNewsletterSubscribe() {
  const email = document.getElementById('newsletter-email').value;
  if (!email) { showToast('Masukkan email terlebih dahulu.', 'warning'); return; }
  showToast(`Terima kasih! ${email} berhasil didaftarkan 🌿`, 'success');
  document.getElementById('newsletter-email').value = '';
}

// ══════════════════════════════════════════════════════════
// BLOG ARTICLES DB
// ══════════════════════════════════════════════════════════
const articlesDB = {
  restarts: {
    title: 'The Art of Guilt-Free Restarts', category: 'Self Care', readTime: '4 Min Read',
    img: 'https://placehold.co/800x480/7F987E/ffffff?text=Guilt-Free+Restarts',
    content: `Conventional productivity systems are built on a dangerous premise: that human focus is a linear machine that never breaks down.\n\nAt LIFLOW, we believe breaks are structural components of long-term consistency, not failures. Our Soft Reset engine lets you choose lightweight challenges like the 3-Day Soft Reset or the 7-Day Gentle Recovery.\n\nProgress isn't about never stopping — it's about how gently you begin again.`,
  },
  hustle: {
    title: 'Escaping the Toxic Hustle Trap', category: 'Mindset', readTime: '5 Min Read',
    img: 'https://placehold.co/800x480/7BBCE6/ffffff?text=Mindful+Productivity',
    content: `We live in a culture that commodifies human attention. But real lifestyle alignment happens when all areas of life exist in a supportive relationship.\n\nLIFLOW splits your energy into 6 balanced pillars: Productivity, Health, Finance, Learning, Relationships, and Self Care.\n\nBalance, not velocity, is the path to true sustainability.`,
  },
  tiny: {
    title: 'Small Moves, Big Streaks', category: 'Habits', readTime: '3 Min Read',
    img: 'https://placehold.co/800x480/FCD385/ffffff?text=Tiny+Habits+Design',
    content: `Why do most resolutions fail? We try to build massive changes on limited willpower. The secret is starting ridiculously small.\n\nA tiny habit — like drinking a glass of water or taking 1-min deep breath — takes under 20 seconds of willpower, yet triggers a dopamine release.\n\nLet LIFLOW safeguard your micro-streaks automatically.`,
  },
};

function openMarketingArticle(id) {
  const art = articlesDB[id];
  if (!art) return;
  document.getElementById('read-title').innerText   = art.title;
  document.getElementById('read-category').innerText = art.category;
  document.getElementById('read-time').innerText    = art.readTime;
  document.getElementById('read-image').src         = art.img;
  document.getElementById('read-content').innerText = art.content;

  const badge = document.getElementById('read-category');
  badge.className = {
    restarts: 'text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full bg-emerald-50 text-liflowGreen',
    hustle:   'text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full bg-sky-50 text-liflowBlue',
    tiny:     'text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full bg-amber-50 text-amber-600',
  }[id] || badge.className;

  navigateTo('article-read');
}

// ══════════════════════════════════════════════════════════
// SMARTPHONE MOCKUP SIMULATOR
// ══════════════════════════════════════════════════════════
function simulateMockupScreen(screenId) {
  state.currentSimulatedScreen = screenId;
  const viewport = document.getElementById('mockup-viewport');
  if (!viewport) return;

  const screens = ['onboarding','dashboard','planner','habits','money','focus','reflection','tomorrow','progress','profile'];
  screens.forEach(s => {
    const btn = document.getElementById(`mock-btn-${s}`);
    if (!btn) return;
    if (s === screenId) {
      btn.className = 'p-3 text-left border rounded-2xl bg-white border-liflowGreen text-stone-800 text-xs font-semibold flex items-center gap-2.5 transition-all shadow-sm';
      btn.children[0].className = 'w-2.5 h-2.5 rounded-full bg-liflowGreen';
    } else {
      btn.className = 'p-3 text-left border rounded-2xl bg-stone-50 hover:bg-stone-100 text-stone-700 text-xs flex items-center gap-2.5 transition-all';
      btn.children[0].className = 'w-2.5 h-2.5 rounded-full bg-stone-300';
    }
  });

  const descs = {
    onboarding:  { title: '1. Welcome Onboarding',          desc: 'Atur tujuan utama Anda dengan visualisasi yang ramah dan estetik.' },
    dashboard:   { title: '2. Live Ecosystem Dashboard',    desc: 'Ringkasan harimu: Life Score, agenda, budget, dan refleksi.' },
    planner:     { title: '3. Interactive Daily Planner',   desc: 'Coba centang tugas di simulator secara langsung!' },
    habits:      { title: '4. Habit Tracker Flow',          desc: 'Konsistensi kebiasaan mikro tanpa rasa bersalah.' },
    money:       { title: '5. Money Tracker Ledger',        desc: 'Catat transaksi harian dengan cepat dan nyaman.' },
    focus:       { title: '6. Meditative Focus Mode',       desc: 'Pomodoro & Deep Work timer terintegrasi real-time.' },
    reflection:  { title: '7. Daily Reflection',            desc: 'Evaluasi malam: mood, pencapaian, dan tantangan.' },
    tomorrow:    { title: '8. Automated Tomorrow Planner',  desc: 'Konfigurasikan rencana esok hari otomatis dari malam ini.' },
    progress:    { title: '9. Progress & Analytics Engine', desc: 'Roda radar keseimbangan hidup 6 pilar visual.' },
    profile:     { title: '10. Personalized Profile Space', desc: 'Ruang personal & streak terpanjang Anda.' },
  };
  document.getElementById('tour-screen-title').innerText = descs[screenId].title;
  document.getElementById('tour-screen-desc').innerText  = descs[screenId].desc;

  viewport.innerHTML = _buildMockupHTML(screenId);
}

function _buildMockupHTML(screenId) {
  switch (screenId) {
    case 'onboarding': return `
      <div class="space-y-4 text-center my-auto flex flex-col justify-center items-center py-6">
        <img src="liflow.png" alt="LIFLOW" class="w-16 h-16 rounded-2xl shadow-md object-cover border border-stone-100" onerror="this.src='https://placehold.co/150/7F987E/ffffff?text=LF'">
        <h4 class="font-serif font-bold text-stone-900 text-sm">Flow Your Life Better</h4>
        <p class="text-[10px] text-stone-500 font-light leading-relaxed px-4">Atur hidupmu dengan lebih terarah, seimbang, dan bermakna.</p>
        <button onclick="simulateMockupScreen('dashboard')" class="bg-liflowGreen text-white text-[9px] font-bold uppercase px-6 py-2.5 rounded-full shadow-sm w-full max-w-[160px]">Mulai Sekarang</button>
      </div>`;

    case 'dashboard': return `
      <div class="space-y-3 text-left">
        <div class="flex justify-between items-center">
          <div><span class="text-[7px] text-stone-400 block font-bold uppercase">Good Morning</span><span class="text-xs font-bold text-stone-900 block leading-none">Zafira! 🌿</span></div>
          <div class="w-6 h-6 rounded-full bg-stone-100 flex items-center justify-center font-bold text-[8px]">Z</div>
        </div>
        <div class="bg-stone-50 p-2.5 rounded-xl border border-stone-200/40 flex justify-between items-center">
          <div><span class="text-[7px] text-stone-400 font-bold block uppercase">Life Score</span><span class="text-base font-extrabold text-stone-900 block leading-none">${state.lifeScore}</span><span class="text-[7px] bg-emerald-100 text-emerald-800 px-1 rounded-full font-bold">Excellent</span></div>
          <div class="w-8 h-8 rounded-full bg-white border-2 border-liflowGreen flex items-center justify-center text-[9px] font-bold text-liflowGreen">86%</div>
        </div>
        <div class="grid grid-cols-3 gap-1.5 text-center">
          <div class="bg-stone-50 border p-1 rounded-lg"><span class="text-[6px] text-stone-400 uppercase block">Aktivitas</span><span class="text-[9px] font-bold text-stone-800">4/6</span></div>
          <div class="bg-stone-50 border p-1 rounded-lg"><span class="text-[6px] text-stone-400 uppercase block">Habit</span><span class="text-[9px] font-bold text-stone-800">3/4</span></div>
          <div class="bg-stone-50 border p-1 rounded-lg"><span class="text-[6px] text-stone-400 uppercase block">Budget</span><span class="text-[9px] font-bold text-stone-800">Rp45K</span></div>
        </div>
        <div class="space-y-1"><span class="text-[7px] font-bold text-stone-400 uppercase">Hari Ini:</span>
          <div class="flex items-center gap-2 p-1.5 bg-stone-50 rounded-lg text-[8px]"><span class="w-1.5 h-1.5 rounded-full bg-liflowGreen"></span><span class="text-stone-700">Kuliah UI/UX (09:00)</span></div>
          <div class="flex items-center gap-2 p-1.5 bg-stone-50 rounded-lg text-[8px]"><span class="w-1.5 h-1.5 rounded-full bg-liflowBlue"></span><span class="text-stone-700">Olahraga 30 min (16:00)</span></div>
        </div>
      </div>`;

    case 'planner': {
      const tList = state.tasks.map(t => `
        <div class="flex items-center justify-between p-2 bg-stone-50 border rounded-xl text-[9px]">
          <div class="flex items-center gap-2">
            <button onclick="toggleMockTask(${t.id})" class="w-3.5 h-3.5 rounded-full border flex items-center justify-center ${t.completed ? 'bg-liflowGreen border-liflowGreen text-white' : 'bg-white border-stone-300'}">
              ${t.completed ? '<i class="fa-solid fa-check text-[7px]"></i>' : ''}
            </button>
            <span class="${t.completed ? 'line-through text-stone-400' : 'text-stone-700'} truncate max-w-[140px]">${t.text}</span>
          </div>
          <span class="text-[6px] font-bold ${t.priority === 'High' ? 'text-rose-500 bg-rose-50' : 'text-stone-400'} px-1 rounded">${t.priority}</span>
        </div>`).join('');
      return `<div class="space-y-3 text-left">
        <div class="border-b pb-1"><span class="text-[7px] text-stone-400 font-bold uppercase">Daily Planner</span><span class="text-xs font-bold text-stone-900 block leading-none">Your Agenda</span></div>
        <div class="flex justify-between items-center"><span class="text-[7px] font-bold text-stone-400 uppercase">Prioritas</span><span class="text-[7px] text-liflowGreen font-bold">${state.tasks.filter(t=>t.completed).length}/${state.tasks.length} Selesai</span></div>
        <div class="space-y-1.5">${tList}</div></div>`; }

    case 'habits': {
      const hList = state.habits.map(h => `
        <div class="p-2 bg-stone-50 border rounded-xl flex justify-between items-center text-[9px]">
          <div class="flex items-center gap-1.5"><i class="fa-solid fa-fire text-amber-500"></i><span class="font-medium text-stone-700">${h.name}</span></div>
          <span class="text-[8px] font-bold text-stone-400 bg-white border px-1.5 py-0.5 rounded-full">${h.streak} hari</span>
        </div>`).join('');
      return `<div class="space-y-3 text-left">
        <div class="border-b pb-1"><span class="text-[7px] text-stone-400 font-bold uppercase">Habit Tracker</span><span class="text-xs font-bold text-stone-900 block">Keberlanjutan</span></div>
        <div class="space-y-1.5">${hList}</div></div>`; }

    case 'money': {
      const trList = state.transactions.map(t => `
        <div class="flex justify-between items-center p-1.5 bg-stone-50 border rounded-lg text-[8px]">
          <span class="text-stone-700 font-medium">${t.name}</span>
          <span class="text-rose-500 font-bold">-Rp ${t.amount.toLocaleString('id-ID')}</span>
        </div>`).join('');
      return `<div class="space-y-3 text-left">
        <div class="border-b pb-1"><span class="text-[7px] text-stone-400 font-bold uppercase">Money Tracker</span><span class="text-xs font-bold text-stone-900 block">Ledger Bulanan</span></div>
        <div class="bg-amber-50/50 p-2 border border-amber-200/40 rounded-xl text-center"><span class="text-[7px] text-stone-400 block uppercase">Sisa Budget Aman</span><span class="text-sm font-black text-stone-900">Rp 375.000</span></div>
        <div class="space-y-1">${trList}</div></div>`; }

    case 'focus': return `
      <div class="space-y-4 text-center py-4 flex flex-col justify-between items-center h-full">
        <div class="flex justify-center gap-1.5">
          <button class="bg-stone-900 text-white text-[8px] font-bold uppercase px-2.5 py-1 rounded-full">Pomodoro</button>
          <button class="bg-stone-100 text-stone-400 text-[8px] font-bold uppercase px-2.5 py-1 rounded-full">Deep Work</button>
        </div>
        <div class="w-32 h-32 rounded-full border-4 border-stone-100 flex items-center justify-center shadow-inner">
          <div><span class="text-2xl font-black text-stone-800 tracking-tight block leading-none">${state.focusMinutes}:${state.focusSeconds < 10 ? '0'+state.focusSeconds : state.focusSeconds}</span><span class="text-[6px] text-stone-400 block uppercase tracking-widest mt-1">POMODORO</span></div>
        </div>
        <div class="flex gap-2">
          <button onclick="toggleMockupTimer()" class="bg-liflowGreen text-white text-[8px] font-bold px-4 py-2 rounded-full shadow-sm">${state.isTimerRunning ? 'Pause' : 'Start Session'}</button>
          <button onclick="resetMockupTimer()" class="bg-stone-100 text-stone-600 text-[8px] px-3 py-2 rounded-full">Reset</button>
        </div>
      </div>`;

    case 'reflection': return `
      <div class="space-y-3 text-left">
        <div class="border-b pb-1"><span class="text-[7px] text-stone-400 font-bold uppercase">Daily Reflection</span><span class="text-xs font-bold text-stone-900 block">Bagaimana Harimu?</span></div>
        <div class="flex justify-center gap-2 py-1 text-lg">
          <button class="opacity-60">😢</button><button class="opacity-60">🙁</button><button class="opacity-60">😐</button>
          <button class="opacity-100 scale-110">🙂</button><button class="opacity-60">🤩</button>
        </div>
        <div class="space-y-2 text-[8px]">
          <div><label class="font-bold text-stone-500 uppercase block">Pencapaian:</label><input type="text" readonly value="Selesaikan struktur UI Liflow" class="w-full bg-stone-50 border rounded px-2 py-1 outline-none text-[8px]"></div>
          <div><label class="font-bold text-stone-500 uppercase block">Tantangan:</label><input type="text" readonly value="Sedikit mengantuk di sore hari" class="w-full bg-stone-50 border rounded px-2 py-1 outline-none text-[8px]"></div>
        </div>
        <button onclick="simulateMockupScreen('tomorrow')" class="w-full bg-liflowGreen text-white text-[8px] font-bold uppercase py-2 rounded-xl">Submit Refleksi</button>
      </div>`;

    case 'tomorrow': return `
      <div class="space-y-3 text-left">
        <div class="text-center py-1"><span class="text-[7px] bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full font-bold uppercase">Siklus Terhubung 🔄</span><h4 class="font-bold text-stone-900 text-[10px] mt-1">Plan Tomorrow</h4></div>
        <div class="space-y-1 text-[8px]">
          <label class="font-bold text-stone-500 uppercase">Fokus Utama Esok:</label>
          <div class="grid grid-cols-4 gap-1 text-center font-bold text-[7px]">
            <span class="p-1.5 border border-purple-200 bg-purple-50 text-purple-800 rounded">🎓 Kuliah</span>
            <span class="p-1.5 border text-stone-400 rounded">🏃 Sehat</span>
            <span class="p-1.5 border text-stone-400 rounded">📖 Belajar</span>
            <span class="p-1.5 border text-stone-400 rounded">🧘 Diri</span>
          </div>
        </div>
        <div class="text-[8px]"><label class="font-bold text-stone-500 uppercase">Aktivitas Esok:</label><input type="text" readonly value="Kuliah Digital Marketing" class="w-full bg-stone-50 border rounded px-2 py-1 outline-none text-[8px] mt-0.5"></div>
        <button onclick="showToast('Rencana esok berhasil!','success');simulateMockupScreen('dashboard');" class="w-full bg-stone-900 text-white text-[8px] font-bold uppercase py-2 rounded-xl">Simpan Rencana Esok</button>
      </div>`;

    case 'progress': return `
      <div class="space-y-3 text-left">
        <div class="border-b pb-1"><span class="text-[7px] text-stone-400 font-bold uppercase">Progress & Analytics</span><span class="text-xs font-bold text-stone-900 block">Life Score Mingguan</span></div>
        <div class="bg-stone-50 border rounded-xl p-2.5 text-center"><span class="text-xl font-extrabold text-stone-900">86</span><span class="text-[7px] text-stone-400 block font-bold uppercase">Average Score</span></div>
        <div class="space-y-1 text-[8px] text-stone-600">
          <div class="flex justify-between"><span>Productivity</span><span class="font-bold">82%</span></div>
          <div class="flex justify-between"><span>Health</span><span class="font-bold">75%</span></div>
          <div class="flex justify-between"><span>Budget</span><span class="font-bold">90%</span></div>
        </div>
      </div>`;

    case 'profile': return `
      <div class="space-y-3 text-center py-4 flex flex-col justify-center h-full">
        <div class="w-12 h-12 bg-stone-200 rounded-full flex items-center justify-center font-bold mx-auto text-sm">Z</div>
        <h4 class="font-bold text-stone-900 text-xs">Zafira</h4>
        <span class="text-[8px] text-stone-400 block">zafira@email.com</span>
        <div class="bg-stone-50 border rounded-xl p-2.5 text-left text-[8px] space-y-1 max-w-[200px] mx-auto w-full">
          <div class="flex justify-between"><span>Streak Terpanjang</span><span class="font-bold text-liflowGreen">12 hari</span></div>
          <div class="flex justify-between border-t pt-1"><span>Versi Sistem</span><span class="font-mono">v1.2 (WAMP)</span></div>
        </div>
      </div>`;

    default: return '';
  }
}

function toggleMockTask(id) {
  const task = state.tasks.find(t => t.id === id);
  if (task) {
    task.completed = !task.completed;
    simulateMockupScreen('planner');
    showToast(task.completed ? 'Agenda diselesaikan!' : 'Agenda dibatalkan.', 'info');
    saveAppStateToMySQL();
  }
}

function toggleMockupTimer() {
  if (state.isTimerRunning) {
    clearInterval(state.focusInterval);
    state.isTimerRunning = false;
    showToast('Timer ditangguhkan.', 'info');
  } else {
    state.isTimerRunning = true;
    showToast('Timer dimulai! Tetap fokus. 🧘', 'success');
    state.focusInterval = setInterval(() => {
      if (state.focusSeconds === 0) {
        if (state.focusMinutes === 0) {
          clearInterval(state.focusInterval);
          state.isTimerRunning = false;
          showToast('Sesi fokus selesai! 🥳', 'success');
          resetMockupTimer(); return;
        }
        state.focusMinutes--; state.focusSeconds = 59;
      } else { state.focusSeconds--; }
      const m = String(state.focusMinutes).padStart(2,'0');
      const s = String(state.focusSeconds).padStart(2,'0');
      const label = document.querySelector('#mockup-viewport span.text-2xl');
      if (label) label.innerText = `${m}:${s}`;
    }, 1000);
  }
  simulateMockupScreen('focus');
}

function resetMockupTimer() {
  clearInterval(state.focusInterval);
  state.isTimerRunning = false;
  state.focusMinutes = 25; state.focusSeconds = 0;
  simulateMockupScreen('focus');
}

// ══════════════════════════════════════════════════════════
// INIT
// ══════════════════════════════════════════════════════════
window.addEventListener('DOMContentLoaded', async () => {
  navigateTo('landing');
  simulateMockupScreen('onboarding');

  const clock = document.getElementById('mockup-clock-time');
  if (clock) clock.innerText = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', hour12: false });

  await loadUserStateFromMySQL();
});
