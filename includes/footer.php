  </main>

  <!-- AUTH MODAL -->
  <div id="lead-modal" class="fixed inset-0 bg-stone-950/40 backdrop-blur-sm z-[100] hidden flex items-center justify-center p-4">
    <div class="bg-white max-w-md w-full rounded-[36px] overflow-hidden border border-stone-100 shadow-2xl p-8 space-y-6 relative">
      <button onclick="closeLeadCapture()" class="w-8 h-8 rounded-full bg-stone-100 hover:bg-stone-200 text-stone-600 transition flex items-center justify-center absolute top-4 right-4">
        <i class="fa-solid fa-xmark text-xs"></i>
      </button>

      <div class="flex border-b border-stone-100 text-xs font-bold uppercase tracking-wider mb-2">
        <button onclick="switchAuthTab('login')"    id="tab-btn-login"    class="flex-1 pb-3 text-center border-b-2 border-liflowGreen text-stone-900">Masuk</button>
        <button onclick="switchAuthTab('register')" id="tab-btn-register" class="flex-1 pb-3 text-center border-b-2 border-transparent text-stone-400">Daftar Akun</button>
      </div>

      <div class="text-center space-y-1">
        <img src="liflow.png" alt="LIFLOW Logo" class="w-14 h-14 rounded-2xl mx-auto mb-3 shadow-md object-cover border border-stone-100" onerror="this.src='https://placehold.co/100/7F987E/ffffff?text=LF'">
        <h3 id="lead-modal-title"    class="text-xl font-serif font-bold text-stone-900">Masuk ke Ruang Fokus Anda</h3>
        <p  id="lead-modal-subtitle" class="text-[11px] text-stone-400 font-light">Masuk ke ruang fokus dan dashboard harian Anda.</p>
      </div>

      <form onsubmit="handleAuthSubmit(event)" class="space-y-4">
        <div class="space-y-1 hidden" id="auth-group-username">
          <label class="text-[10px] font-bold text-stone-500 uppercase tracking-wider block">Username</label>
          <input type="text" id="auth-username" placeholder="E.g., zafira" class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-2.5 text-xs outline-none focus:ring-1 focus:ring-liflowGreen">
        </div>
        <div class="space-y-1">
          <label class="text-[10px] font-bold text-stone-500 uppercase tracking-wider block">Email / Username</label>
          <input type="text" id="auth-email" required placeholder="name@example.com" class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-2.5 text-xs outline-none focus:ring-1 focus:ring-liflowGreen">
        </div>
        <div class="space-y-1">
          <label class="text-[10px] font-bold text-stone-500 uppercase tracking-wider block">Password</label>
          <input type="password" id="auth-password" required placeholder="••••••••" class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-2.5 text-xs outline-none focus:ring-1 focus:ring-liflowGreen">
        </div>
        <button type="submit" class="w-full bg-liflowGreen hover:bg-stone-700 text-white text-xs font-bold uppercase tracking-widest py-3.5 rounded-xl transition shadow-md">
          <span id="auth-submit-label">Konfirmasi Masuk</span>
        </button>
      </form>
      <p class="text-[9px] text-stone-400 text-center italic">*Sistem terenkripsi untuk keamanan data pribadi Anda.</p>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="w-full border-t border-stone-200 bg-white/60 py-8">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
      <p class="text-xs text-stone-500 font-light max-w-xl">
        "💚 LIFLOW is a complete personal life ecosystem supporting conscious and pressure-free productivity habits."
      </p>
      <div class="flex gap-4 text-xs font-semibold text-stone-400">
        <a href="#" class="hover:text-liflowGreen transition">Privacy Policy</a>
        <span>•</span>
        <a href="#" class="hover:text-liflowGreen transition">Terms of Service</a>
      </div>
    </div>
  </footer>

  <!-- Application JavaScript -->
  <script src="assets/js/app.js"></script>
</body>
</html>
