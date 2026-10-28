<!-- ========================================================
     LIFLOW - About Page View
     ======================================================== -->
<div id="view-about" class="view-transition hidden-view max-w-4xl mx-auto px-6 py-16 space-y-12">
  <div class="text-center space-y-4">
    <span class="text-xs font-bold text-liflowGreen uppercase tracking-wider block">Our Soul &amp; Vision</span>
    <h2 class="text-4xl font-serif font-bold text-stone-900">Guilt-Free Life Architecture</h2>
    <p class="text-stone-500 font-light max-w-xl mx-auto">We designed LIFLOW to challenge the stressful paradigm of toxic hyper-productivity.</p>
  </div>

  <div class="grid md:grid-cols-2 gap-8 items-center bg-white p-8 rounded-3xl border border-stone-200/60 shadow-sm">
    <div class="space-y-4">
      <h4 class="font-bold text-stone-900 text-lg">Why LIFLOW Was Built</h4>
      <p class="text-xs text-stone-600 leading-relaxed font-light">Conventional apps penalize you with streak losses and warning states when life gets in the way. They treat you like a factory machine. LIFLOW assumes you are human.</p>
      <p class="text-xs text-stone-600 leading-relaxed font-light">Our software metrics are engineered to hold space for recovery. This is why we include gentle, non-punishing reset systems and meditative pauses right inside our core design engine.</p>
    </div>
    <div class="bg-stone-50 p-6 rounded-2xl border border-stone-100 flex flex-col justify-center gap-4">
      <div class="flex items-center gap-3">
        <div class="w-8 h-8 rounded-full bg-emerald-100 text-liflowGreen flex items-center justify-center text-xs">✨</div>
        <span class="text-xs font-bold text-stone-800">No Guilt Framework Pattern</span>
      </div>
      <div class="flex items-center gap-3">
        <div class="w-8 h-8 rounded-full bg-sky-100 text-liflowBlue flex items-center justify-center text-xs">🧘</div>
        <span class="text-xs font-bold text-stone-800">Always Supportive Microcopy</span>
      </div>
      <div class="flex items-center gap-3">
        <div class="w-8 h-8 rounded-full bg-purple-100 text-liflowPurple flex items-center justify-center text-xs">🔄</div>
        <span class="text-xs font-bold text-stone-800">Integrated Cyclic Framework Loop</span>
      </div>
    </div>
  </div>

  <!-- Team Values -->
  <div class="grid md:grid-cols-3 gap-6">
    <div class="bg-white border border-stone-200/60 p-6 rounded-3xl space-y-3 hover:shadow-md transition">
      <div class="w-10 h-10 rounded-2xl bg-emerald-50 flex items-center justify-center text-lg">🌿</div>
      <h4 class="font-bold text-stone-900 text-sm">Organik &amp; Manusiawi</h4>
      <p class="text-xs text-stone-500 font-light leading-relaxed">Setiap fitur LIFLOW dirancang mengikuti ritme alami manusia, bukan target produktivitas yang kaku.</p>
    </div>
    <div class="bg-white border border-stone-200/60 p-6 rounded-3xl space-y-3 hover:shadow-md transition">
      <div class="w-10 h-10 rounded-2xl bg-sky-50 flex items-center justify-center text-lg">🔒</div>
      <h4 class="font-bold text-stone-900 text-sm">Privasi Lokal Penuh</h4>
      <p class="text-xs text-stone-500 font-light leading-relaxed">Data kamu tersimpan di database MySQL milik kamu sendiri. Tidak ada cloud yang menyentuh data pribadimu.</p>
    </div>
    <div class="bg-white border border-stone-200/60 p-6 rounded-3xl space-y-3 hover:shadow-md transition">
      <div class="w-10 h-10 rounded-2xl bg-purple-50 flex items-center justify-center text-lg">🚀</div>
      <h4 class="font-bold text-stone-900 text-sm">Terus Berkembang</h4>
      <p class="text-xs text-stone-500 font-light leading-relaxed">Roadmap aktif: Minggu 4 kami berencana deploy ke Flask/Streamlit untuk aksesibilitas yang lebih luas.</p>
    </div>
  </div>

  <!-- WhatsApp & Customer Care Section -->
  <div class="bg-gradient-to-br from-emerald-50 via-white to-teal-50 border border-emerald-100 p-8 rounded-3xl space-y-4 shadow-xs">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
      <div class="space-y-2">
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-emerald-100/70 text-emerald-800 text-[10px] font-bold uppercase tracking-wider rounded-full">
          <i class="fa-brands fa-whatsapp text-emerald-600"></i> Fast Response Support
        </div>
        <h3 class="font-serif font-bold text-stone-900 text-2xl">Terhubung Langsung dengan Tim Kami</h3>
        <p class="text-xs text-stone-600 leading-relaxed font-light max-w-xl">
          Punya pertanyaan seputar instalasi lokal WAMP, paket bundling, atau masukan untuk sistem Life OS? Hubungi nomor resmi WhatsApp kami: <strong class="text-stone-900 font-semibold"><?= htmlspecialchars(defined('WHATSAPP_DISPLAY') ? WHATSAPP_DISPLAY : '0857-4254-6223') ?></strong>.
        </p>
      </div>
      <a href="<?= get_whatsapp_url('Halo Tim LIFLOW, saya ingin terhubung dan berkonsultasi mengenai LIFLOW Life OS.') ?>" target="_blank" rel="noopener noreferrer" class="px-6 py-3.5 bg-[#25D366] hover:bg-[#20BD5A] text-white text-xs font-bold uppercase tracking-wider rounded-2xl transition shadow-md hover:shadow-lg flex items-center gap-2.5 shrink-0">
        <i class="fa-brands fa-whatsapp text-lg"></i>
        <span>Chat via WhatsApp</span>
      </a>
    </div>
  </div>
</div>
