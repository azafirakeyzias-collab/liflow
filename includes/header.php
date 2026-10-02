<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="LIFLOW — Sistem manajemen hidup berkelanjutan (Life OS) premium. Daily Planner, Habit Tracker, Money Tracker, Focus Mode, dan Analytics dalam satu ekosistem.">
  <title>LIFLOW - Flow Your Life Better | Personal Life Operating System</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Custom Styles -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- Tailwind Custom Config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            liflowGreen:     '#7F987E',
            liflowSoftGreen: '#C1D1C3',
            liflowBlue:      '#7BBCE6',
            liflowYellow:    '#FCD385',
            liflowPurple:    '#C2B2F0',
            liflowBg:        '#FAF9F6',
            liflowDark:      '#1C1917',
            liflowMuted:     '#78716C',
          },
          fontFamily: {
            sans:  ['Poppins', 'sans-serif'],
            serif: ['Playfair Display', 'serif'],
          },
        },
      },
    };
  </script>

  <!-- PHP Runtime Config injected for JS -->
  <script>
    window.LIFLOW_CONFIG = {
      isDbConnected: <?php echo $db_connected ? 'true' : 'false'; ?>,
      sessionUserId: <?php echo isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 'null'; ?>,
    };
  </script>
</head>
<body class="bg-liflowBg text-stone-800 selection:bg-liflowSoftGreen/40 antialiased min-h-screen flex flex-col justify-between">

  <!-- TOAST CONTAINER -->
  <div id="toast-container" class="fixed bottom-6 right-6 z-[100] flex flex-col gap-2.5 pointer-events-none"></div>



  <!-- NAVBAR -->
  <header class="w-full bg-white/85 backdrop-blur-md border-b border-stone-200/60 sticky top-0 z-40 transition-all">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">

      <div class="flex items-center gap-3 cursor-pointer" onclick="navigateTo('landing')">
        <img src="liflow.png" alt="LIFLOW Logo" class="w-10 h-10 rounded-xl shadow-sm object-cover border border-stone-100" onerror="this.src='https://placehold.co/100/7F987E/ffffff?text=LF'">
        <div>
          <span class="text-lg font-bold tracking-tight text-stone-900 block leading-none">LIFLOW</span>
          <span class="text-[9px] text-stone-400 font-medium tracking-widest uppercase">Life Operating System</span>
        </div>
      </div>

      <!-- Desktop Nav -->
      <nav class="hidden lg:flex items-center gap-8 text-xs font-semibold uppercase tracking-wider text-stone-600">
        <button onclick="navigateTo('landing')"  id="nav-btn-landing"  class="text-liflowGreen transition-all">Home</button>
        <button onclick="navigateTo('features')" id="nav-btn-features" class="hover:text-liflowGreen transition-all">Fitur</button>
        <button onclick="navigateTo('pricing')"  id="nav-btn-pricing"  class="hover:text-liflowGreen transition-all">Servis</button>
        <button onclick="navigateTo('blog')"     id="nav-btn-blog"     class="hover:text-liflowGreen transition-all">Blog</button>
        <button onclick="navigateTo('about')"    id="nav-btn-about"    class="hover:text-liflowGreen transition-all">About</button>
      </nav>

      <!-- Auth Buttons -->
      <div class="flex items-center gap-3">
        <?php if (isset($_SESSION['user_id'])): ?>
          <span class="text-xs text-stone-500 font-medium hidden md:inline">Halo, <strong class="text-stone-800"><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
          <button onclick="handleLogout()" class="border border-stone-200 hover:bg-stone-50 text-stone-700 text-xs font-bold uppercase py-2.5 px-5 rounded-full transition shadow-sm">Log Out</button>
        <?php else: ?>
          <button onclick="showLeadCapture('Login')"    class="text-xs font-bold uppercase tracking-wider text-stone-600 hover:text-liflowGreen transition-all py-2 px-4">Log In</button>
          <button onclick="showLeadCapture('Register')" class="bg-liflowGreen hover:bg-stone-700 text-white text-xs font-bold uppercase tracking-widest py-3 px-6 rounded-full shadow-md transition-all duration-300">Start Free</button>
        <?php endif; ?>
        <button onclick="toggleMobileDrawer()" class="lg:hidden w-10 h-10 rounded-full bg-stone-100 flex items-center justify-center text-stone-600 hover:bg-stone-200 transition">
          <i class="fa-solid fa-bars text-sm"></i>
        </button>
      </div>
    </div>
  </header>

  <!-- MOBILE DRAWER -->
  <div id="mobile-drawer" class="fixed inset-y-0 right-0 w-64 bg-white shadow-2xl border-l border-stone-100 z-50 transform translate-x-full transition-transform duration-300 ease-in-out p-6 flex flex-col justify-between hidden">
    <div class="space-y-6">
      <div class="flex justify-between items-center pb-4 border-b border-stone-100">
        <span class="font-bold text-stone-900 text-sm">Navigasi LIFLOW</span>
        <button onclick="toggleMobileDrawer()" class="w-8 h-8 rounded-full bg-stone-50 text-stone-600 flex items-center justify-center hover:bg-stone-100 transition">
          <i class="fa-solid fa-xmark text-xs"></i>
        </button>
      </div>
      <nav class="flex flex-col gap-4 text-xs font-semibold uppercase tracking-wider text-stone-600">
        <button onclick="navigateToMobile('landing')"  class="text-left py-2 hover:text-liflowGreen transition">Home</button>
        <button onclick="navigateToMobile('features')" class="text-left py-2 hover:text-liflowGreen transition">Fitur</button>
        <button onclick="navigateToMobile('pricing')"  class="text-left py-2 hover:text-liflowGreen transition">Servis</button>
        <button onclick="navigateToMobile('blog')"     class="text-left py-2 hover:text-liflowGreen transition">Blog</button>
        <button onclick="navigateToMobile('about')"    class="text-left py-2 hover:text-liflowGreen transition">About</button>
      </nav>
    </div>
    <p class="text-[9px] text-stone-400 italic">"Flow Your Life Better"</p>
  </div>

  <!-- MAIN WRAPPER -->
  <main class="w-full flex-grow relative">
