<!-- ========================================================
     LIFLOW - Blog / Journal View
     ======================================================== -->
<div id="view-blog" class="view-transition hidden-view max-w-7xl mx-auto px-6 py-16 space-y-12">
  <div class="text-center space-y-4">
    <span class="text-xs font-bold text-liflowGreen uppercase tracking-wider block">Mindful Reads</span>
    <h2 class="text-4xl font-serif font-bold text-stone-900">LIFLOW Journal</h2>
    <p class="text-stone-500 font-light max-w-xl mx-auto">Thoughts and ideas written to help you find balance, flow gently, and avoid toxic hyper-productivity burnout.</p>
  </div>

  <div class="grid md:grid-cols-3 gap-8 pt-6">
    <!-- Article 1 -->
    <article class="bg-white border border-stone-200/60 rounded-3xl overflow-hidden shadow-xs hover:shadow-md transition flex flex-col justify-between">
      <div>
        <img src="https://placehold.co/600x400/7F987E/ffffff?text=Guilt-Free+Restarts" alt="Restarts" class="w-full h-48 object-cover">
        <div class="p-6 space-y-3">
          <div class="flex items-center gap-2 text-[10px] font-bold text-liflowGreen uppercase tracking-wider">
            <span>Self Care</span> • <span>4 Min Read</span>
          </div>
          <h3 class="font-serif font-bold text-stone-900 text-lg leading-snug">The Art of Guilt-Free Restarts</h3>
          <p class="text-xs text-stone-500 leading-relaxed font-light">Why conventional apps fail by punishing you for taking breaks, and how to embrace a supportive reset.</p>
        </div>
      </div>
      <div class="p-6 pt-0">
        <button onclick="openMarketingArticle('restarts')" class="text-xs font-bold text-liflowGreen hover:text-stone-700 flex items-center gap-1">Read Article <i class="fa-solid fa-arrow-right text-[10px]"></i></button>
      </div>
    </article>

    <!-- Article 2 -->
    <article class="bg-white border border-stone-200/60 rounded-3xl overflow-hidden shadow-xs hover:shadow-md transition flex flex-col justify-between">
      <div>
        <img src="https://placehold.co/600x400/7BBCE6/ffffff?text=Mindful+Productivity" alt="Productivity" class="w-full h-48 object-cover">
        <div class="p-6 space-y-3">
          <div class="flex items-center gap-2 text-[10px] font-bold text-liflowBlue uppercase tracking-wider">
            <span>Mindset</span> • <span>5 Min Read</span>
          </div>
          <h3 class="font-serif font-bold text-stone-900 text-lg leading-snug">Escaping the Toxic Hustle Trap</h3>
          <p class="text-xs text-stone-500 leading-relaxed font-light">How to transition from "relentless streaks" to "harmonious cyclic balance" across 6 key pillars.</p>
        </div>
      </div>
      <div class="p-6 pt-0">
        <button onclick="openMarketingArticle('hustle')" class="text-xs font-bold text-liflowGreen hover:text-stone-700 flex items-center gap-1">Read Article <i class="fa-solid fa-arrow-right text-[10px]"></i></button>
      </div>
    </article>

    <!-- Article 3 -->
    <article class="bg-white border border-stone-200/60 rounded-3xl overflow-hidden shadow-xs hover:shadow-md transition flex flex-col justify-between">
      <div>
        <img src="https://placehold.co/600x400/FCD385/ffffff?text=Tiny+Habits+Design" alt="Tiny Habits" class="w-full h-48 object-cover">
        <div class="p-6 space-y-3">
          <div class="flex items-center gap-2 text-[10px] font-bold text-amber-500 uppercase tracking-wider">
            <span>Habits</span> • <span>3 Min Read</span>
          </div>
          <h3 class="font-serif font-bold text-stone-900 text-lg leading-snug">Small Moves, Big Streaks</h3>
          <p class="text-xs text-stone-500 leading-relaxed font-light">The psychological blueprint of tiny habits. How a single glass of water resets your cognitive load.</p>
        </div>
      </div>
      <div class="p-6 pt-0">
        <button onclick="openMarketingArticle('tiny')" class="text-xs font-bold text-liflowGreen hover:text-stone-700 flex items-center gap-1">Read Article <i class="fa-solid fa-arrow-right text-[10px]"></i></button>
      </div>
    </article>
  </div>
</div>

<!-- ========================================================
     LIFLOW - Article Reader View
     ======================================================== -->
<div id="view-article-read" class="view-transition hidden-view max-w-3xl mx-auto px-6 py-16 space-y-8">
  <button onclick="navigateTo('blog')" class="text-xs font-bold text-stone-500 hover:text-liflowGreen flex items-center gap-2 group transition">
    <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i> Back to Journal
  </button>

  <div class="space-y-4">
    <div class="flex items-center gap-3">
      <span id="read-category" class="text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full bg-emerald-50 text-liflowGreen">Self Care</span>
      <span id="read-time"     class="text-[10px] text-stone-400 font-medium">4 Min Read</span>
    </div>
    <h1 id="read-title" class="text-3xl sm:text-4xl lg:text-5xl font-serif font-bold text-stone-900 leading-tight">Title</h1>
    <div class="flex items-center gap-3 pt-2 pb-6 border-b border-stone-200/50">
      <div class="w-10 h-10 rounded-full bg-liflowGreen/10 flex items-center justify-center font-bold text-xs text-liflowGreen">LF</div>
      <div>
        <span class="text-xs font-bold text-stone-900 block">LIFLOW Editorial Board</span>
        <span class="text-[10px] text-stone-400">Mindful Lifestyle Team</span>
      </div>
    </div>
  </div>

  <img id="read-image" src="" alt="Article cover" class="w-full h-80 object-cover rounded-3xl shadow-sm">
  <article id="read-content" class="text-stone-600 font-light text-sm leading-relaxed space-y-6 whitespace-pre-line"></article>

  <!-- Newsletter CTA -->
  <div class="bg-stone-100/50 border p-8 rounded-3xl space-y-4 mt-12 text-center max-w-2xl mx-auto">
    <h4 class="font-serif font-bold text-stone-900 text-lg">Liked this journal note? 🌿</h4>
    <p class="text-xs text-stone-500 max-w-sm mx-auto">Get monthly notes on guilt-free productivity delivered straight to your inbox.</p>
    <div class="flex max-w-md mx-auto gap-2 pt-2">
      <input type="email" id="newsletter-email" placeholder="name@example.com" class="w-full bg-white border border-stone-200 rounded-xl px-4 py-2.5 text-xs outline-none focus:ring-1 focus:ring-liflowGreen">
      <button onclick="handleNewsletterSubscribe()" class="bg-liflowGreen hover:bg-stone-700 text-white text-xs font-bold px-5 py-2.5 rounded-xl transition shrink-0 shadow-sm">Subscribe</button>
    </div>
  </div>
</div>
