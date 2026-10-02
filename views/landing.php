<!-- ========================================================
     LIFLOW - Landing Page View
     ======================================================== -->
<div id="view-landing" class="view-transition active-view">

  <!-- HERO SECTION -->
  <section class="max-w-7xl mx-auto px-6 py-12 lg:py-20 grid lg:grid-cols-12 gap-12 items-center">
    <div class="lg:col-span-7 space-y-6">
      <div class="inline-flex items-center gap-2 px-3 py-1 bg-stone-100 border border-stone-200 text-liflowGreen font-bold text-[10px] uppercase tracking-wider rounded-full">
        <span class="w-2 h-2 rounded-full bg-liflowGreen animate-pulse"></span> Personal Life Operating System
      </div>
      <h1 class="text-4xl sm:text-5xl lg:text-6xl font-serif font-bold text-stone-900 leading-tight">
        Flow Your Life <span class="text-liflowGreen italic">Better.</span>
      </h1>
      <p class="text-stone-600 text-sm sm:text-base md:text-lg leading-relaxed font-light max-w-xl">
        Sistem manajemen hidup terpadu yang memadukan Daily Planner, Habit Tracker, Money Tracker, Focus Timer, dan Refleksi Harian dalam satu alur yang harmonis.
      </p>
      <div class="flex flex-wrap gap-4 pt-3">
        <button onclick="showLeadCapture('Register')" class="bg-liflowGreen hover:bg-stone-700 text-white text-xs font-bold uppercase tracking-widest py-4 px-8 rounded-full shadow-lg hover:shadow-xl transition-all duration-300">
          Start Free Today
        </button>
        <button onclick="scrollToInteractiveMockup()" class="border border-stone-200 bg-white hover:bg-stone-50 text-stone-700 text-xs font-bold uppercase tracking-widest py-4 px-8 rounded-full shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-2">
          <i class="fa-solid fa-mobile-screen-button text-[10px] text-liflowGreen"></i> Try App Live Tour
        </button>
      </div>
    </div>

    <!-- Hero SVG Illustration -->
    <div class="lg:col-span-5 flex justify-center relative">
      <div class="absolute w-[360px] h-[360px] bg-gradient-to-tr from-liflowSoftGreen/25 to-liflowBlue/20 rounded-full blur-3xl -z-10 animate-pulse"></div>
      <svg class="w-full max-w-sm animate-float" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="100" cy="100" r="75" class="stroke-stone-200" stroke-width="2" stroke-dasharray="6 6"/>
        <circle cx="100" cy="25"  r="16" class="fill-white stroke-liflowGreen"  stroke-width="3"/>
        <circle cx="175" cy="100" r="16" class="fill-white stroke-liflowBlue"   stroke-width="3"/>
        <circle cx="100" cy="175" r="16" class="fill-white stroke-liflowYellow" stroke-width="3"/>
        <circle cx="25"  cy="100" r="16" class="fill-white stroke-liflowPurple" stroke-width="3"/>
        <text x="100" y="29"  font-family="Poppins" font-size="8" fill="#1C1917" text-anchor="middle" font-weight="bold">PLAN</text>
        <text x="175" y="104" font-family="Poppins" font-size="8" fill="#1C1917" text-anchor="middle" font-weight="bold">DO</text>
        <text x="100" y="179" font-family="Poppins" font-size="8" fill="#1C1917" text-anchor="middle" font-weight="bold">TRACK</text>
        <text x="25"  y="104" font-family="Poppins" font-size="8" fill="#1C1917" text-anchor="middle" font-weight="bold">EVAL</text>
        <circle cx="100" cy="100" r="32" class="fill-liflowGreen"/>
        <path d="M100 82 A 18 18 0 1 1 82 100" fill="none" stroke="white" stroke-width="3" stroke-linecap="round"/>
        <path d="M112 88 C 114 85, 118 85, 118 89 C 118 92, 113 95, 110 95 C 109 91, 110 89, 112 88 Z" fill="white"/>
      </svg>
    </div>
  </section>

  <!-- PHILOSOPHY VALUES -->
  <section class="max-w-7xl mx-auto px-6 py-20 border-t border-stone-200/50">
    <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
      <span class="text-xs font-bold text-liflowGreen uppercase tracking-wider block">Our Soul</span>
      <h2 class="text-3xl sm:text-4xl font-serif font-bold text-stone-900">Empathy-Driven Life Architecture</h2>
      <p class="text-stone-500 text-xs sm:text-sm font-light max-w-xl mx-auto">Traditional tools make you feel like a machine. LIFLOW is built around your natural human rhythm.</p>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
      <div class="bg-white border border-stone-200/60 p-8 rounded-3xl hover:shadow-md transition space-y-4">
        <div class="w-12 h-12 rounded-2xl bg-stone-50 text-liflowGreen flex items-center justify-center text-xl"><i class="fa-solid fa-heart-pulse"></i></div>
        <h3 class="font-serif font-bold text-stone-900 text-base">Empathy Over Streaks</h3>
        <p class="text-xs text-stone-500 leading-relaxed font-light">We never penalize you for resting. LIFLOW treats life's pauses as safe recovery phases.</p>
      </div>
      <div class="bg-white border border-stone-200/60 p-8 rounded-3xl hover:shadow-md transition space-y-4">
        <div class="w-12 h-12 rounded-2xl bg-sky-50 text-liflowBlue flex items-center justify-center text-xl"><i class="fa-solid fa-compass"></i></div>
        <h3 class="font-serif font-bold text-stone-900 text-base">Conscious Balance</h3>
        <p class="text-xs text-stone-500 leading-relaxed font-light">Our 6-pillar balance wheel helps you find central harmony — not sprint velocity.</p>
      </div>
      <div class="bg-white border border-stone-200/60 p-8 rounded-3xl hover:shadow-md transition space-y-4">
        <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center text-xl"><i class="fa-solid fa-feather-pointed"></i></div>
        <h3 class="font-serif font-bold text-stone-900 text-base">Organic Micro-wins</h3>
        <p class="text-xs text-stone-500 leading-relaxed font-light">By promoting tiny habits under 1 minute, we remove willpower friction entirely.</p>
      </div>
      <div class="bg-white border border-stone-200/60 p-8 rounded-3xl hover:shadow-md transition space-y-4">
        <div class="w-12 h-12 rounded-2xl bg-purple-50 text-liflowPurple flex items-center justify-center text-xl"><i class="fa-solid fa-vault"></i></div>
        <h3 class="font-serif font-bold text-stone-900 text-base">Sacred Space &amp; Privacy</h3>
        <p class="text-xs text-stone-500 leading-relaxed font-light">Data tersimpan di database MySQL Anda sendiri — privat dan mandiri sepenuhnya.</p>
      </div>
    </div>
  </section>

  <!-- 4 CORE PILLARS -->
  <section class="bg-white border-y border-stone-200/60 py-16">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center max-w-3xl mx-auto space-y-4">
        <span class="text-xs font-bold text-liflowGreen uppercase tracking-wider">Unparalleled Cohesion</span>
        <h2 class="text-3xl font-serif font-bold text-stone-900">4 Core Ecosystem Pillars</h2>
        <p class="text-stone-500 text-xs sm:text-sm font-light">Alur kerja fundamental terintegrasi dari desain LIFLOW.</p>
      </div>
      <div class="grid md:grid-cols-4 gap-8 mt-12">
        <div class="bg-stone-50 p-6 rounded-2xl border border-stone-100 hover:scale-105 transition-all">
          <span class="text-2xl mb-3 block">📅</span>
          <h4 class="font-bold text-stone-900 text-sm">Plan</h4>
          <p class="text-[11px] text-stone-500 mt-2 leading-relaxed">Map targets, structure schedules, and establish healthy priorities with minimal friction.</p>
        </div>
        <div class="bg-stone-50 p-6 rounded-2xl border border-stone-100 hover:scale-105 transition-all">
          <span class="text-2xl mb-3 block">⚡</span>
          <h4 class="font-bold text-stone-900 text-sm">Do</h4>
          <p class="text-[11px] text-stone-500 mt-2 leading-relaxed">Boost deep productivity with distraction-free Pomodoro and deep work sessions.</p>
        </div>
        <div class="bg-stone-50 p-6 rounded-2xl border border-stone-100 hover:scale-105 transition-all">
          <span class="text-2xl mb-3 block">📊</span>
          <h4 class="font-bold text-stone-900 text-sm">Track</h4>
          <p class="text-[11px] text-stone-500 mt-2 leading-relaxed">Collect streak accomplishments, budget records, and visual lifestyle scores.</p>
        </div>
        <div class="bg-stone-50 p-6 rounded-2xl border border-stone-100 hover:scale-105 transition-all">
          <span class="text-2xl mb-3 block">🧘</span>
          <h4 class="font-bold text-stone-900 text-sm">Evaluate</h4>
          <p class="text-[11px] text-stone-500 mt-2 leading-relaxed">Warm evening reviews to prepare for the next step of the continuous cycle.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- INTERACTIVE PRODUCT TOUR -->
  <section id="interactive-product-tour" class="max-w-7xl mx-auto px-6 py-20 border-b border-stone-200/40">
    <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
      <span class="text-xs font-bold text-liflowGreen uppercase tracking-wider block">Interactive Experience</span>
      <h2 class="text-3xl sm:text-4xl font-serif font-bold text-stone-900">Explore the 10-Screen UI Flow Live</h2>
      <p class="text-stone-500 text-xs sm:text-sm font-light max-w-xl mx-auto">Test and interact with our actual application screens right here from the website.</p>
    </div>
    <div class="grid lg:grid-cols-12 gap-12 items-center">
      <!-- Screen Controls -->
      <div class="lg:col-span-7 space-y-6">
        <span class="text-xs font-bold text-stone-400 uppercase tracking-widest block">Select A Mobile Screen:</span>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
          <button onclick="simulateMockupScreen('onboarding')"  id="mock-btn-onboarding"  class="p-3 text-left border rounded-2xl bg-white border-liflowGreen text-stone-800 text-xs font-semibold flex items-center gap-2.5 transition-all"><span class="w-2.5 h-2.5 rounded-full bg-liflowGreen"></span> 1. Onboarding</button>
          <button onclick="simulateMockupScreen('dashboard')"   id="mock-btn-dashboard"   class="p-3 text-left border rounded-2xl bg-stone-50 hover:bg-stone-100 text-stone-700 text-xs flex items-center gap-2.5 transition-all"><span class="w-2.5 h-2.5 rounded-full bg-stone-300"></span> 2. Dashboard</button>
          <button onclick="simulateMockupScreen('planner')"     id="mock-btn-planner"     class="p-3 text-left border rounded-2xl bg-stone-50 hover:bg-stone-100 text-stone-700 text-xs flex items-center gap-2.5 transition-all"><span class="w-2.5 h-2.5 rounded-full bg-stone-300"></span> 3. Daily Planner</button>
          <button onclick="simulateMockupScreen('habits')"      id="mock-btn-habits"      class="p-3 text-left border rounded-2xl bg-stone-50 hover:bg-stone-100 text-stone-700 text-xs flex items-center gap-2.5 transition-all"><span class="w-2.5 h-2.5 rounded-full bg-stone-300"></span> 4. Habit Tracker</button>
          <button onclick="simulateMockupScreen('money')"       id="mock-btn-money"       class="p-3 text-left border rounded-2xl bg-stone-50 hover:bg-stone-100 text-stone-700 text-xs flex items-center gap-2.5 transition-all"><span class="w-2.5 h-2.5 rounded-full bg-stone-300"></span> 5. Money Tracker</button>
          <button onclick="simulateMockupScreen('focus')"       id="mock-btn-focus"       class="p-3 text-left border rounded-2xl bg-stone-50 hover:bg-stone-100 text-stone-700 text-xs flex items-center gap-2.5 transition-all"><span class="w-2.5 h-2.5 rounded-full bg-stone-300"></span> 6. Focus Mode</button>
          <button onclick="simulateMockupScreen('reflection')"  id="mock-btn-reflection"  class="p-3 text-left border rounded-2xl bg-stone-50 hover:bg-stone-100 text-stone-700 text-xs flex items-center gap-2.5 transition-all"><span class="w-2.5 h-2.5 rounded-full bg-stone-300"></span> 7. Daily Reflection</button>
          <button onclick="simulateMockupScreen('tomorrow')"    id="mock-btn-tomorrow"    class="p-3 text-left border rounded-2xl bg-stone-50 hover:bg-stone-100 text-stone-700 text-xs flex items-center gap-2.5 transition-all"><span class="w-2.5 h-2.5 rounded-full bg-stone-300"></span> 8. Plan Tomorrow</button>
          <button onclick="simulateMockupScreen('progress')"    id="mock-btn-progress"    class="p-3 text-left border rounded-2xl bg-stone-50 hover:bg-stone-100 text-stone-700 text-xs flex items-center gap-2.5 transition-all"><span class="w-2.5 h-2.5 rounded-full bg-stone-300"></span> 9. Progress &amp; Analytics</button>
          <button onclick="simulateMockupScreen('profile')"     id="mock-btn-profile"     class="p-3 text-left border rounded-2xl bg-stone-50 hover:bg-stone-100 text-stone-700 text-xs flex items-center gap-2.5 transition-all"><span class="w-2.5 h-2.5 rounded-full bg-stone-300"></span> 10. Profile</button>
        </div>
        <div class="bg-stone-100/50 p-6 rounded-3xl border border-stone-200/40 space-y-2">
          <h4 id="tour-screen-title" class="font-serif font-bold text-stone-900 text-base">1. Welcome Onboarding</h4>
          <p  id="tour-screen-desc"  class="text-stone-500 text-xs leading-relaxed font-light">Atur tujuan utama Anda dengan visualisasi yang ramah dan estetik.</p>
        </div>
      </div>

      <!-- Smartphone Frame -->
      <div class="lg:col-span-5 flex justify-center relative">
        <div class="absolute w-[320px] h-[320px] bg-gradient-to-tr from-liflowSoftGreen/20 to-liflowBlue/20 rounded-full blur-3xl -z-10 animate-pulse"></div>
        <div class="relative w-[310px] h-[610px] bg-white rounded-[45px] shadow-2xl border-[10px] border-stone-900 overflow-hidden flex flex-col justify-between p-4">
          <div class="w-full flex justify-between items-center px-2 pt-1 text-[9px] font-bold text-stone-500 z-10">
            <span id="mockup-clock-time">09:41</span>
            <div class="w-24 h-4 bg-stone-900 rounded-full absolute left-1/2 -translate-x-1/2 top-1"></div>
            <div class="flex gap-1.5 items-center"><i class="fa-solid fa-signal"></i><i class="fa-solid fa-wifi"></i><i class="fa-solid fa-battery-full text-xs"></i></div>
          </div>
          <div class="flex-grow overflow-y-auto mt-4 px-2 py-1 flex flex-col justify-between" id="mockup-viewport"></div>
          <div class="w-full bg-white border-t border-stone-100 pt-2 flex justify-between px-3 text-stone-400 text-[9px] z-10">
            <div class="flex flex-col items-center cursor-pointer text-liflowGreen"><i class="fa-solid fa-house-chimney"></i><span class="text-[7px] mt-0.5">Home</span></div>
            <div class="flex flex-col items-center cursor-pointer"><i class="fa-regular fa-calendar"></i><span class="text-[7px] mt-0.5">Plan</span></div>
            <div class="flex flex-col items-center cursor-pointer"><i class="fa-solid fa-droplet"></i><span class="text-[7px] mt-0.5">Habits</span></div>
            <div class="flex flex-col items-center cursor-pointer"><i class="fa-solid fa-brain"></i><span class="text-[7px] mt-0.5">Reflect</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CUSTOMER REVIEWS -->
  <section class="max-w-7xl mx-auto px-6 py-20 border-t border-stone-200/40">
    <div class="text-center max-w-3xl mx-auto space-y-4 mb-14">
      <span class="text-xs font-bold text-liflowGreen uppercase tracking-wider block">Ulasan Pengguna Bundling</span>
      <h2 class="text-3xl sm:text-4xl font-serif font-bold text-stone-900">Apa Kata Mereka?</h2>
      <p class="text-stone-500 text-xs sm:text-sm font-light max-w-xl mx-auto">Review nyata dari para pengguna yang telah bergabung dalam paket bundling LIFLOW.</p>
    </div>
    <div class="grid md:grid-cols-3 gap-8 mb-14">
      <!-- Review 1 -->
      <div class="bg-white border border-stone-200/60 p-8 rounded-3xl hover:shadow-lg transition relative flex flex-col justify-between">
        <div><i class="fa-solid fa-quote-left text-liflowGreen/20 text-5xl absolute -top-3 left-5"></i>
          <div class="flex mb-3">
            <i class="fa-solid fa-star text-amber-400 text-xs"></i><i class="fa-solid fa-star text-amber-400 text-xs"></i><i class="fa-solid fa-star text-amber-400 text-xs"></i><i class="fa-solid fa-star text-amber-400 text-xs"></i><i class="fa-solid fa-star text-amber-400 text-xs"></i>
          </div>
          <p class="text-xs text-stone-600 italic font-light leading-relaxed">"LIFLOW benar-benar mengubah cara saya mengelola waktu. Bundling-nya lengkap banget — dari planner harian, habit tracker, sampai focus mode. Saya merasa jauh lebih produktif tapi tetap seimbang!"</p>
        </div>
        <div class="flex items-center gap-3 mt-6">
          <div class="w-10 h-10 rounded-full bg-liflowGreen/10 border border-liflowGreen/20 flex items-center justify-center font-bold text-xs text-liflowGreen">AR</div>
          <div><span class="text-xs font-bold text-stone-900 block leading-none">Arini R.</span><span class="text-[10px] text-stone-400">Mahasiswa S1 Psikologi · Bundling Starter</span></div>
        </div>
      </div>
      <!-- Review 2 -->
      <div class="bg-white border border-stone-200/60 p-8 rounded-3xl hover:shadow-lg transition relative flex flex-col justify-between">
        <div><i class="fa-solid fa-quote-left text-liflowBlue/20 text-5xl absolute -top-3 left-5"></i>
          <div class="flex mb-3">
            <i class="fa-solid fa-star text-amber-400 text-xs"></i><i class="fa-solid fa-star text-amber-400 text-xs"></i><i class="fa-solid fa-star text-amber-400 text-xs"></i><i class="fa-solid fa-star text-amber-400 text-xs"></i><i class="fa-solid fa-star text-amber-400 text-xs"></i>
          </div>
          <p class="text-xs text-stone-600 italic font-light leading-relaxed">"Saya sudah coba banyak life OS, tapi LIFLOW paling ramah buat pemula. Money tracker-nya simpel tapi powerful. Bundling premiumnya worth it!"</p>
        </div>
        <div class="flex items-center gap-3 mt-6">
          <div class="w-10 h-10 rounded-full bg-liflowBlue/10 border border-liflowBlue/20 flex items-center justify-center font-bold text-xs text-liflowBlue">FA</div>
          <div><span class="text-xs font-bold text-stone-900 block leading-none">Fadhil A.</span><span class="text-[10px] text-stone-400">Freelance Developer · Bundling Premium</span></div>
        </div>
      </div>
      <!-- Review 3 -->
      <div class="bg-white border border-stone-200/60 p-8 rounded-3xl hover:shadow-lg transition relative flex flex-col justify-between">
        <div><i class="fa-solid fa-quote-left text-liflowYellow/30 text-5xl absolute -top-3 left-5"></i>
          <div class="flex mb-3">
            <i class="fa-solid fa-star text-amber-400 text-xs"></i><i class="fa-solid fa-star text-amber-400 text-xs"></i><i class="fa-solid fa-star text-amber-400 text-xs"></i><i class="fa-solid fa-star text-amber-400 text-xs"></i><i class="fa-regular fa-star text-stone-300 text-xs"></i>
          </div>
          <p class="text-xs text-stone-600 italic font-light leading-relaxed">"Bundling LIFLOW adalah investasi terbaik buat produktivitas saya. Template refleksi hariannya bikin saya sadar banyak hal yang sering terlewat!"</p>
        </div>
        <div class="flex items-center gap-3 mt-6">
          <div class="w-10 h-10 rounded-full bg-amber-100 border border-amber-200 flex items-center justify-center font-bold text-xs text-amber-600">DM</div>
          <div><span class="text-xs font-bold text-stone-900 block leading-none">Dinda M.</span><span class="text-[10px] text-stone-400">Content Creator · Bundling All-In-One</span></div>
        </div>
      </div>
    </div>
    <!-- Stats Row -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
      <div class="bg-white border p-6 rounded-3xl shadow-xs"><span class="text-4xl font-extrabold text-liflowGreen block">150K+</span><span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest block mt-2">Pengguna Aktif</span></div>
      <div class="bg-white border p-6 rounded-3xl shadow-xs"><span class="text-4xl font-extrabold text-liflowBlue block">98%</span><span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest block mt-2">Konsistensi</span></div>
      <div class="bg-white border p-6 rounded-3xl shadow-xs"><span class="text-4xl font-extrabold text-liflowYellow block">4.9★</span><span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest block mt-2">Rating Bundling</span></div>
      <div class="bg-white border p-6 rounded-3xl shadow-xs"><span class="text-4xl font-extrabold text-liflowPurple block">0%</span><span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest block mt-2">Punishment Design</span></div>
    </div>
  </section>

  <!-- BLOG TEASER -->
  <section class="max-w-7xl mx-auto px-6 py-16 border-t border-stone-200/40">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-4">
      <div class="space-y-3">
        <span class="text-xs font-bold text-liflowGreen uppercase tracking-wider block">Mindfulness Reads</span>
        <h2 class="text-3xl font-serif font-bold text-stone-900">Notes from our Blog</h2>
        <p class="text-stone-500 text-xs sm:text-sm font-light max-w-xl">Artikel empatik untuk menemukan keseimbangan dan menghindari burnout.</p>
      </div>
      <button onclick="navigateTo('blog')" class="bg-stone-100 hover:bg-stone-200 text-stone-700 text-xs font-bold uppercase tracking-wider py-3 px-6 rounded-full transition flex items-center gap-2">Baca Semua <i class="fa-solid fa-arrow-right text-[10px]"></i></button>
    </div>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="bg-white border border-stone-200/60 rounded-3xl overflow-hidden shadow-xs hover:shadow-md transition flex flex-col justify-between">
        <div><img src="https://placehold.co/600x400/7F987E/ffffff?text=Guilt-Free+Restarts" alt="Restarts" class="w-full h-48 object-cover">
          <div class="p-6 space-y-3"><span class="text-[9px] font-bold text-liflowGreen uppercase tracking-widest bg-emerald-50 px-2.5 py-1 rounded-full w-max block">Self Care</span><h3 class="font-serif font-bold text-stone-900 text-base leading-snug">The Art of Guilt-Free Restarts</h3><p class="text-[11px] text-stone-500 leading-relaxed font-light">Why conventional apps fail by punishing you for taking breaks.</p></div></div>
        <div class="p-6 pt-0"><button onclick="openMarketingArticle('restarts')" class="text-xs font-bold text-liflowGreen hover:text-stone-700 flex items-center gap-1">Read Article <i class="fa-solid fa-arrow-right text-[10px]"></i></button></div>
      </div>
      <div class="bg-white border border-stone-200/60 rounded-3xl overflow-hidden shadow-xs hover:shadow-md transition flex flex-col justify-between">
        <div><img src="https://placehold.co/600x400/7BBCE6/ffffff?text=Mindful+Productivity" alt="Productivity" class="w-full h-48 object-cover">
          <div class="p-6 space-y-3"><span class="text-[9px] font-bold text-liflowBlue uppercase tracking-widest bg-sky-50 px-2.5 py-1 rounded-full w-max block">Mindset</span><h3 class="font-serif font-bold text-stone-900 text-base leading-snug">Escaping the Toxic Hustle Trap</h3><p class="text-[11px] text-stone-500 leading-relaxed font-light">Harmonious cyclic balance across 6 key life pillars.</p></div></div>
        <div class="p-6 pt-0"><button onclick="openMarketingArticle('hustle')" class="text-xs font-bold text-liflowGreen hover:text-stone-700 flex items-center gap-1">Read Article <i class="fa-solid fa-arrow-right text-[10px]"></i></button></div>
      </div>
      <div class="bg-white border border-stone-200/60 rounded-3xl overflow-hidden shadow-xs hover:shadow-md transition flex flex-col justify-between">
        <div><img src="https://placehold.co/600x400/FCD385/ffffff?text=Tiny+Habits+Design" alt="Tiny Habits" class="w-full h-48 object-cover">
          <div class="p-6 space-y-3"><span class="text-[9px] font-bold text-amber-500 bg-amber-50 px-2.5 py-1 rounded-full w-max block">Habits</span><h3 class="font-serif font-bold text-stone-900 text-base leading-snug">Small Moves, Big Streaks</h3><p class="text-[11px] text-stone-500 leading-relaxed font-light">The psychological blueprint of tiny habits and micro-wins.</p></div></div>
        <div class="p-6 pt-0"><button onclick="openMarketingArticle('tiny')" class="text-xs font-bold text-liflowGreen hover:text-stone-700 flex items-center gap-1">Read Article <i class="fa-solid fa-arrow-right text-[10px]"></i></button></div>
      </div>
    </div>
  </section>
</div>
