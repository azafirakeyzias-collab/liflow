<!-- ========================================================
     LIFLOW - Features Page View (Tab System)
     ======================================================== -->
<div id="view-features" class="view-transition hidden-view max-w-7xl mx-auto px-6 py-16 space-y-12">
  <div class="text-center space-y-4">
    <span class="text-xs font-bold text-liflowGreen uppercase tracking-wider block">10 Core Application Flows</span>
    <h2 class="text-4xl font-serif font-bold text-stone-900">Semua Fitur LIFLOW</h2>
    <p class="text-stone-500 font-light max-w-xl mx-auto">Jelajahi semua alur aplikasi yang dirancang untuk membawa keseimbangan nyata ke dalam hidupmu.</p>
  </div>

  <!-- Tab Navigator -->
  <div class="flex justify-center">
    <div class="inline-flex bg-stone-100 rounded-2xl p-1.5 gap-1 flex-wrap justify-center">
      <button onclick="switchFeatureTab('planning')"  id="ftab-btn-planning"  class="px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider bg-white text-stone-900 shadow-sm transition">📅 Planning</button>
      <button onclick="switchFeatureTab('wellness')"  id="ftab-btn-wellness"  class="px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-stone-400 hover:text-stone-600 transition">💚 Wellness</button>
      <button onclick="switchFeatureTab('finance')"   id="ftab-btn-finance"   class="px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-stone-400 hover:text-stone-600 transition">💰 Finance</button>
      <button onclick="switchFeatureTab('analytics')" id="ftab-btn-analytics" class="px-5 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-stone-400 hover:text-stone-600 transition">📊 Analytics</button>
    </div>
  </div>

  <!-- ── Tab: Planning ── -->
  <div id="ftab-planning" class="space-y-8">
    <div class="flex items-center gap-3 mb-2">
      <div class="w-10 h-10 rounded-2xl bg-emerald-100 flex items-center justify-center text-liflowGreen text-lg">📅</div>
      <div>
        <h3 class="font-serif font-bold text-stone-900 text-xl">Planning &amp; Produktivitas</h3>
        <p class="text-xs text-stone-500 font-light">Rencanakan harimu dengan struktur yang jelas dan tanpa tekanan.</p>
      </div>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white border border-stone-200/60 p-6 rounded-3xl space-y-3 hover:shadow-lg transition group">
        <div class="w-10 h-10 rounded-2xl bg-emerald-50 flex items-center justify-center text-xl group-hover:scale-110 transition">🚀</div>
        <span class="text-[10px] font-bold bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full uppercase tracking-wider inline-block">1. Onboarding</span>
        <h4 class="font-bold text-stone-900 text-base">Introduction Loop Setup</h4>
        <p class="text-xs text-stone-500 leading-relaxed font-light">Input tujuan utama, nilai hidup, dan target sehatmu sejak hari pertama.</p>
      </div>
      <div class="bg-white border border-stone-200/60 p-6 rounded-3xl space-y-3 hover:shadow-lg transition group">
        <div class="w-10 h-10 rounded-2xl bg-stone-50 flex items-center justify-center text-xl group-hover:scale-110 transition">🏠</div>
        <span class="text-[10px] font-bold bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full uppercase tracking-wider inline-block">2. Dashboard</span>
        <h4 class="font-bold text-stone-900 text-base">Ecosystem Glance</h4>
        <p class="text-xs text-stone-500 leading-relaxed font-light">Ringkasan terpadu: Life Score, agenda harian, dan status habit dalam satu layar.</p>
      </div>
      <div class="bg-white border border-stone-200/60 p-6 rounded-3xl space-y-3 hover:shadow-lg transition group">
        <div class="w-10 h-10 rounded-2xl bg-emerald-50 flex items-center justify-center text-xl group-hover:scale-110 transition">📋</div>
        <span class="text-[10px] font-bold bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full uppercase tracking-wider inline-block">3. Daily Planner</span>
        <h4 class="font-bold text-stone-900 text-base">Prioritized Agenda</h4>
        <p class="text-xs text-stone-500 leading-relaxed font-light">Susun agenda harian dengan prioritas High/Medium/Low. Pantau progres dengan mudah.</p>
      </div>
      <div class="bg-white border border-stone-200/60 p-6 rounded-3xl space-y-3 hover:shadow-lg transition group md:col-span-2">
        <div class="w-10 h-10 rounded-2xl bg-emerald-50 flex items-center justify-center text-xl group-hover:scale-110 transition">⏱️</div>
        <span class="text-[10px] font-bold bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full uppercase tracking-wider inline-block">6. Focus Mode</span>
        <h4 class="font-bold text-stone-900 text-base">Deep Mind Pomodoro</h4>
        <p class="text-xs text-stone-500 leading-relaxed font-light">Singkirkan gangguan dengan Pomodoro &amp; Deep Work terintegrasi. Layar overlay bebas distraksi.</p>
      </div>
      <div class="bg-white border border-stone-200/60 p-6 rounded-3xl space-y-3 hover:shadow-lg transition group">
        <div class="w-10 h-10 rounded-2xl bg-purple-50 flex items-center justify-center text-xl group-hover:scale-110 transition">🔄</div>
        <span class="text-[10px] font-bold bg-purple-100 text-purple-800 px-2 py-0.5 rounded-full uppercase tracking-wider inline-block">8. Plan Tomorrow</span>
        <h4 class="font-bold text-stone-900 text-base">Continuous Loop Connector</h4>
        <p class="text-xs text-stone-500 leading-relaxed font-light">Ubah catatan malam ini langsung menjadi rencana esok hari. Istirahat tenang, bangun fokus.</p>
      </div>
    </div>
  </div>

  <!-- ── Tab: Wellness ── -->
  <div id="ftab-wellness" class="space-y-8 hidden">
    <div class="flex items-center gap-3 mb-2">
      <div class="w-10 h-10 rounded-2xl bg-emerald-100 flex items-center justify-center text-liflowGreen text-lg">💚</div>
      <div>
        <h3 class="font-serif font-bold text-stone-900 text-xl">Wellness &amp; Refleksi</h3>
        <p class="text-xs text-stone-500 font-light">Jaga keseimbangan jiwa dan raga dengan fitur-fitur empatik LIFLOW.</p>
      </div>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white border border-stone-200/60 p-6 rounded-3xl space-y-3 hover:shadow-lg transition group">
        <div class="w-10 h-10 rounded-2xl bg-sky-50 flex items-center justify-center text-xl group-hover:scale-110 transition">🔥</div>
        <span class="text-[10px] font-bold bg-sky-100 text-sky-800 px-2 py-0.5 rounded-full uppercase tracking-wider inline-block">4. Habit Tracker</span>
        <h4 class="font-bold text-stone-900 text-base">Supportive Micro-Habits</h4>
        <p class="text-xs text-stone-500 leading-relaxed font-light">Pertahankan kebiasaan mikro sehat tanpa hambatan willpower. Bangun streak alami.</p>
      </div>
      <div class="bg-white border border-stone-200/60 p-6 rounded-3xl space-y-3 hover:shadow-lg transition group md:col-span-2">
        <div class="w-10 h-10 rounded-2xl bg-purple-50 flex items-center justify-center text-xl group-hover:scale-110 transition">🌙</div>
        <span class="text-[10px] font-bold bg-purple-100 text-purple-800 px-2 py-0.5 rounded-full uppercase tracking-wider inline-block">7. Daily Reflection</span>
        <h4 class="font-bold text-stone-900 text-base">Evening Mental Prompts</h4>
        <p class="text-xs text-stone-500 leading-relaxed font-light">Evaluasi harian yang santai: pilih mood, catat pencapaian kecil, dan dokumentasikan tantangan.</p>
      </div>
      <div class="bg-gradient-to-br from-liflowGreen/10 to-liflowBlue/10 border border-liflowGreen/20 p-6 rounded-3xl space-y-3 md:col-span-3">
        <div class="flex items-start gap-4">
          <div class="w-12 h-12 rounded-2xl bg-white border border-liflowGreen/20 flex items-center justify-center text-2xl shrink-0">✨</div>
          <div>
            <h4 class="font-bold text-stone-900 text-base mb-1">Desain Tanpa Rasa Bersalah</h4>
            <p class="text-xs text-stone-600 font-light leading-relaxed">Semua fitur Wellness LIFLOW dirancang dengan prinsip <strong>empathy-first</strong> — tidak ada peringatan merah, tidak ada penalti streak. Kalau kamu butuh istirahat, LIFLOW mendukung sepenuhnya dengan sistem <em>Soft Reset Challenge</em>.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ── Tab: Finance ── -->
  <div id="ftab-finance" class="space-y-8 hidden">
    <div class="flex items-center gap-3 mb-2">
      <div class="w-10 h-10 rounded-2xl bg-amber-100 flex items-center justify-center text-amber-600 text-lg">💰</div>
      <div>
        <h3 class="font-serif font-bold text-stone-900 text-xl">Finance &amp; Money Tracker</h3>
        <p class="text-xs text-stone-500 font-light">Kelola keuanganmu dengan mindful — tanpa spreadsheet rumit.</p>
      </div>
    </div>
    <div class="grid md:grid-cols-2 gap-6">
      <div class="bg-white border border-stone-200/60 p-6 rounded-3xl space-y-3 hover:shadow-lg transition group">
        <div class="w-10 h-10 rounded-2xl bg-amber-50 flex items-center justify-center text-xl group-hover:scale-110 transition">💳</div>
        <span class="text-[10px] font-bold bg-amber-100 text-amber-800 px-2 py-0.5 rounded-full uppercase tracking-wider inline-block">5. Money Tracker</span>
        <h4 class="font-bold text-stone-900 text-base">Mindful Budget Ledger</h4>
        <p class="text-xs text-stone-500 leading-relaxed font-light">Catat pemasukan dan pengeluaran harian dengan cepat. Pantau sisa budget secara real-time.</p>
      </div>
      <div class="bg-amber-50/60 border border-amber-200/50 p-6 rounded-3xl space-y-4">
        <h4 class="font-bold text-stone-800 text-sm">Contoh Tampilan Budget:</h4>
        <div class="space-y-2">
          <div class="bg-white p-3 rounded-xl border border-amber-100 flex justify-between items-center text-xs"><span class="text-stone-600 font-medium">🍜 Makan Siang</span><span class="text-rose-500 font-bold">-Rp 25.000</span></div>
          <div class="bg-white p-3 rounded-xl border border-amber-100 flex justify-between items-center text-xs"><span class="text-stone-600 font-medium">🚌 Transportasi</span><span class="text-rose-500 font-bold">-Rp 15.000</span></div>
          <div class="bg-white p-3 rounded-xl border border-emerald-100 flex justify-between items-center text-xs"><span class="text-stone-600 font-medium">💼 Freelance</span><span class="text-emerald-600 font-bold">+Rp 500.000</span></div>
          <div class="bg-amber-100/80 p-3 rounded-xl flex justify-between items-center text-xs font-bold"><span class="text-stone-700">Sisa Budget Aman</span><span class="text-stone-900">Rp 375.000</span></div>
        </div>
      </div>
    </div>
  </div>

  <!-- ── Tab: Analytics ── -->
  <div id="ftab-analytics" class="space-y-8 hidden">
    <div class="flex items-center gap-3 mb-2">
      <div class="w-10 h-10 rounded-2xl bg-liflowBlue/20 flex items-center justify-center text-liflowBlue text-lg">📊</div>
      <div>
        <h3 class="font-serif font-bold text-stone-900 text-xl">Analytics &amp; Profil</h3>
        <p class="text-xs text-stone-500 font-light">Lihat perkembangan hidupmu secara holistik dengan visualisasi yang cantik.</p>
      </div>
    </div>
    <div class="grid md:grid-cols-2 gap-6">
      <div class="bg-white border border-stone-200/60 p-6 rounded-3xl space-y-3 hover:shadow-lg transition group">
        <div class="w-10 h-10 rounded-2xl bg-sky-50 flex items-center justify-center text-xl group-hover:scale-110 transition">🎯</div>
        <span class="text-[10px] font-bold bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full uppercase tracking-wider inline-block">9. Progress &amp; Analytics</span>
        <h4 class="font-bold text-stone-900 text-base">Life Balance Radar Wheel</h4>
        <p class="text-xs text-stone-500 leading-relaxed font-light">Visualisasikan 6 koordinat gaya hidup: Produktivitas, Kesehatan, Finansial, Belajar, Relasi, Self-Care.</p>
      </div>
      <div class="bg-white border border-stone-200/60 p-6 rounded-3xl space-y-3 hover:shadow-lg transition group">
        <div class="w-10 h-10 rounded-2xl bg-purple-50 flex items-center justify-center text-xl group-hover:scale-110 transition">👤</div>
        <span class="text-[10px] font-bold bg-purple-100 text-purple-800 px-2 py-0.5 rounded-full uppercase tracking-wider inline-block">10. Profile Space</span>
        <h4 class="font-bold text-stone-900 text-base">Personalized Sacred Space</h4>
        <p class="text-xs text-stone-500 leading-relaxed font-light">Pantau rekor streak terpanjang, kelola privasi data, dan sesuaikan preferensi LIFLOW milikmu.</p>
      </div>
      <!-- 6 Pillars -->
      <div class="bg-gradient-to-br from-liflowBlue/10 to-liflowPurple/10 border border-liflowBlue/20 p-6 rounded-3xl space-y-4 md:col-span-2">
        <h4 class="font-bold text-stone-900 text-sm mb-3">6 Pilar Life Score LIFLOW:</h4>
        <div class="grid grid-cols-3 sm:grid-cols-6 gap-3 text-center">
          <div class="bg-white p-3 rounded-2xl border border-stone-100 space-y-1"><span class="text-xl block">⚡</span><span class="text-[9px] font-bold text-stone-600 uppercase block">Produktivitas</span><div class="w-full bg-stone-100 rounded-full h-1.5"><div class="bg-liflowGreen h-1.5 rounded-full" style="width:82%"></div></div></div>
          <div class="bg-white p-3 rounded-2xl border border-stone-100 space-y-1"><span class="text-xl block">🏃</span><span class="text-[9px] font-bold text-stone-600 uppercase block">Kesehatan</span><div class="w-full bg-stone-100 rounded-full h-1.5"><div class="bg-liflowBlue h-1.5 rounded-full" style="width:75%"></div></div></div>
          <div class="bg-white p-3 rounded-2xl border border-stone-100 space-y-1"><span class="text-xl block">💰</span><span class="text-[9px] font-bold text-stone-600 uppercase block">Finansial</span><div class="w-full bg-stone-100 rounded-full h-1.5"><div class="bg-liflowYellow h-1.5 rounded-full" style="width:90%"></div></div></div>
          <div class="bg-white p-3 rounded-2xl border border-stone-100 space-y-1"><span class="text-xl block">📚</span><span class="text-[9px] font-bold text-stone-600 uppercase block">Belajar</span><div class="w-full bg-stone-100 rounded-full h-1.5"><div class="bg-liflowPurple h-1.5 rounded-full" style="width:68%"></div></div></div>
          <div class="bg-white p-3 rounded-2xl border border-stone-100 space-y-1"><span class="text-xl block">🤝</span><span class="text-[9px] font-bold text-stone-600 uppercase block">Relasi</span><div class="w-full bg-stone-100 rounded-full h-1.5"><div class="bg-liflowGreen h-1.5 rounded-full" style="width:79%"></div></div></div>
          <div class="bg-white p-3 rounded-2xl border border-stone-100 space-y-1"><span class="text-xl block">🧘</span><span class="text-[9px] font-bold text-stone-600 uppercase block">Self-Care</span><div class="w-full bg-stone-100 rounded-full h-1.5"><div class="bg-liflowBlue h-1.5 rounded-full" style="width:86%"></div></div></div>
        </div>
      </div>
    </div>
  </div>
</div>
