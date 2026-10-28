<?php
/**
 * ========================================================
 * LIFLOW - WhatsApp Floating Chat Widget
 * Nomor Kontak Resmi: 0857-4254-6223 (6285742546223)
 * ========================================================
 */
$wa_number  = defined('WHATSAPP_NUMBER') ? WHATSAPP_NUMBER : '6285742546223';
$wa_display = defined('WHATSAPP_DISPLAY') ? WHATSAPP_DISPLAY : '0857-4254-6223';
$is_app     = !empty($is_logged_in);
?>
<!-- ══ WHATSAPP FLOATING WIDGET ═════════════════════════════ -->
<div id="liflow-wa-container" class="fixed <?= $is_app ? 'bottom-20 right-4 lg:bottom-6 lg:right-6' : 'bottom-6 right-6' ?> z-[120] font-sans">

  <!-- Chat Popover Window -->
  <div id="liflow-wa-window" class="hidden absolute bottom-16 right-0 w-[330px] sm:w-[360px] bg-white rounded-[28px] shadow-2xl border border-stone-200/80 overflow-hidden transform transition-all duration-300 origin-bottom-right">
    
    <!-- Header -->
    <div class="bg-gradient-to-r from-[#128C7E] to-[#25D366] p-4 text-white flex items-center justify-between shadow-sm">
      <div class="flex items-center gap-3">
        <div class="relative w-10 h-10 rounded-full bg-white/20 backdrop-blur-xs flex items-center justify-center border border-white/30 text-white font-bold">
          <i class="fa-brands fa-whatsapp text-xl"></i>
          <span class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-300 border-2 border-[#128C7E] rounded-full"></span>
        </div>
        <div>
          <h4 class="font-bold text-sm leading-tight flex items-center gap-1.5">
            LIFLOW Support <i class="fa-solid fa-circle-check text-xs text-white/90"></i>
          </h4>
          <span class="text-[11px] text-white/90 block font-light">Online • <?= htmlspecialchars($wa_display) ?></span>
        </div>
      </div>
      <button type="button" onclick="toggleWhatsAppWidget(false)" class="w-8 h-8 rounded-full bg-black/10 hover:bg-black/20 text-white flex items-center justify-center transition" aria-label="Tutup Chat">
        <i class="fa-solid fa-xmark text-xs"></i>
      </button>
    </div>

    <!-- Chat Body -->
    <div class="p-4 bg-stone-50/70 space-y-3.5 max-h-[380px] overflow-y-auto">
      
      <!-- CS Bubble -->
      <div class="bg-white p-3.5 rounded-2xl rounded-tl-none border border-stone-100 shadow-xs space-y-1.5 text-xs text-stone-700">
        <div class="flex items-center justify-between text-[10px] text-stone-400 font-semibold mb-1">
          <span>Customer Care</span>
          <span>Baru saja</span>
        </div>
        <p class="leading-relaxed">
          Halo! 👋 Selamat datang di <strong>LIFLOW</strong>. Ada yang bisa kami bantu seputar sistem Life OS atau paket bundling?
        </p>
        <p class="text-[11px] text-stone-500 font-light">
          Silakan pilih topik cepat di bawah atau tulis pesan Anda:
        </p>
      </div>

      <!-- Quick Topics / Chips -->
      <div class="space-y-1.5">
        <span class="text-[10px] font-bold text-stone-400 uppercase tracking-wider block">Pilih Topik Cepat:</span>
        <div class="flex flex-col gap-1.5">
          <button type="button" onclick="selectWhatsAppTopic('Halo LIFLOW, saya ingin konsultasi mengenai paket bundling spesial (Starter / All-In-One).')" class="w-full text-left px-3 py-2 rounded-xl bg-white hover:bg-emerald-50 hover:text-emerald-800 border border-stone-200/80 text-stone-700 text-xs font-medium transition flex items-center gap-2 group">
            <span class="text-emerald-600">📦</span>
            <span class="truncate">Konsultasi Paket Bundling</span>
            <i class="fa-solid fa-arrow-right text-[10px] ml-auto opacity-0 group-hover:opacity-100 transition text-emerald-600"></i>
          </button>
          <button type="button" onclick="selectWhatsAppTopic('Halo LIFLOW, saya ingin bertanya seputar fitur Life OS (Planner, Habits, Money, Focus Mode).')" class="w-full text-left px-3 py-2 rounded-xl bg-white hover:bg-emerald-50 hover:text-emerald-800 border border-stone-200/80 text-stone-700 text-xs font-medium transition flex items-center gap-2 group">
            <span class="text-emerald-600">🌿</span>
            <span class="truncate">Tanya Fitur Life OS</span>
            <i class="fa-solid fa-arrow-right text-[10px] ml-auto opacity-0 group-hover:opacity-100 transition text-emerald-600"></i>
          </button>
          <button type="button" onclick="selectWhatsAppTopic('Halo LIFLOW Support, saya butuh bantuan teknis terkait akun atau kendala sistem.')" class="w-full text-left px-3 py-2 rounded-xl bg-white hover:bg-emerald-50 hover:text-emerald-800 border border-stone-200/80 text-stone-700 text-xs font-medium transition flex items-center gap-2 group">
            <span class="text-emerald-600">🛠️</span>
            <span class="truncate">Bantuan Akun &amp; Teknis</span>
            <i class="fa-solid fa-arrow-right text-[10px] ml-auto opacity-0 group-hover:opacity-100 transition text-emerald-600"></i>
          </button>
        </div>
      </div>

      <!-- Custom Input Box -->
      <div class="space-y-1.5 pt-1">
        <label for="wa-custom-input" class="text-[10px] font-bold text-stone-400 uppercase tracking-wider block">Pesan Kustom:</label>
        <div class="relative">
          <textarea id="wa-custom-input" rows="2" placeholder="Tulis pertanyaan Anda di sini..." class="w-full bg-white border border-stone-200 rounded-xl px-3.5 py-2.5 text-xs text-stone-800 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 resize-none transition leading-relaxed"></textarea>
        </div>
      </div>

      <!-- Action Button -->
      <button type="button" onclick="sendWhatsAppDirect()" class="w-full bg-[#25D366] hover:bg-[#20BD5A] text-white py-3 px-4 rounded-xl font-bold text-xs uppercase tracking-wider transition shadow-md hover:shadow-lg flex items-center justify-center gap-2">
        <i class="fa-brands fa-whatsapp text-base"></i>
        <span>Mulai Chat di WhatsApp</span>
      </button>

      <!-- Direct Fallback Link -->
      <div class="text-center pt-0.5">
        <a href="https://wa.me/<?= $wa_number ?>?text=<?= rawurlencode('Halo LIFLOW Support, saya ingin bertanya mengenai layanan LIFLOW.') ?>" target="_blank" rel="noopener noreferrer" class="text-[10px] text-stone-400 hover:text-emerald-700 transition font-light inline-flex items-center gap-1">
          <span>Langsung buka aplikasi WhatsApp</span>
          <i class="fa-solid fa-arrow-up-right-from-square text-[9px]"></i>
        </a>
      </div>

    </div>
  </div>

  <!-- Floating Trigger Button -->
  <div class="relative flex items-center justify-end">
    
    <!-- Tooltip Bubble on Desktop -->
    <div id="liflow-wa-tooltip" class="hidden sm:flex items-center gap-2 bg-white text-stone-800 text-xs font-semibold px-3 py-1.5 rounded-full shadow-lg border border-stone-100 mr-3 animate-fade-in whitespace-nowrap cursor-pointer hover:bg-stone-50 transition" onclick="toggleWhatsAppWidget()">
      <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
      <span>Chat WhatsApp (<?= htmlspecialchars($wa_display) ?>)</span>
    </div>

    <!-- Floating Action Button (FAB) -->
    <button type="button" id="liflow-wa-fab" onclick="toggleWhatsAppWidget()" class="relative w-14 h-14 rounded-full bg-[#25D366] hover:bg-[#20BD5A] text-white shadow-xl hover:shadow-2xl flex items-center justify-center transition-all duration-300 transform hover:scale-105 active:scale-95 group focus:outline-none" aria-label="Buka WhatsApp Chat">
      <!-- Pulsing halo ring -->
      <span class="absolute -inset-1 rounded-full bg-[#25D366]/40 animate-ping pointer-events-none opacity-60"></span>

      <!-- Icon -->
      <i id="liflow-wa-icon" class="fa-brands fa-whatsapp text-3xl transition-transform duration-300"></i>

      <!-- Online badge indicator -->
      <span class="absolute top-0 right-0 flex h-3.5 w-3.5">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-300 opacity-75"></span>
        <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-emerald-400 border-2 border-white"></span>
      </span>
    </button>

  </div>
</div>

<script>
/**
 * WhatsApp Widget Interactive Controller
 */
(function() {
  const WA_NUMBER = "<?= $wa_number ?>";
  const defaultText = "Halo LIFLOW Support, saya ingin bertanya seputar layanan LIFLOW.";

  window.toggleWhatsAppWidget = function(forceState) {
    const win = document.getElementById('liflow-wa-window');
    const icon = document.getElementById('liflow-wa-icon');
    if (!win) return;

    const isCurrentlyOpen = !win.classList.contains('hidden');
    const shouldOpen = (typeof forceState === 'boolean') ? forceState : !isCurrentlyOpen;

    if (shouldOpen) {
      win.classList.remove('hidden');
      if (icon) {
        icon.classList.remove('fa-brands', 'fa-whatsapp');
        icon.classList.add('fa-solid', 'fa-xmark');
      }
      setTimeout(() => {
        const input = document.getElementById('wa-custom-input');
        if (input) input.focus();
      }, 100);
    } else {
      win.classList.add('hidden');
      if (icon) {
        icon.classList.remove('fa-solid', 'fa-xmark');
        icon.classList.add('fa-brands', 'fa-whatsapp');
      }
    }
  };

  window.selectWhatsAppTopic = function(topicText) {
    const input = document.getElementById('wa-custom-input');
    if (input) {
      input.value = topicText;
      input.focus();
    }
  };

  window.sendWhatsAppDirect = function() {
    const input = document.getElementById('wa-custom-input');
    let message = input && input.value.trim() ? input.value.trim() : defaultText;
    const url = "https://wa.me/" + WA_NUMBER + "?text=" + encodeURIComponent(message);
    window.open(url, "_blank", "noopener,noreferrer");
  };

  // Close when clicking outside widget
  document.addEventListener('click', function(e) {
    const container = document.getElementById('liflow-wa-container');
    const win = document.getElementById('liflow-wa-window');
    if (container && win && !win.classList.contains('hidden')) {
      if (!container.contains(e.target)) {
        window.toggleWhatsAppWidget(false);
      }
    }
  });

  // Enter key in textarea (Ctrl+Enter or Cmd+Enter to send)
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      window.toggleWhatsAppWidget(false);
    }
    const input = document.getElementById('wa-custom-input');
    if (input && document.activeElement === input && e.key === 'Enter' && !e.shiftKey) {
      e.preventDefault();
      window.sendWhatsAppDirect();
    }
  });
})();
</script>
