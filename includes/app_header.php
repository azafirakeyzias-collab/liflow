<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LIFLOW App — <?= htmlspecialchars($_SESSION['username'] ?? 'Dashboard') ?></title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/app.css">

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

  <script>
    window.LIFLOW_CONFIG = {
      isDbConnected: <?php echo $db_connected ? 'true' : 'false'; ?>,
      sessionUserId: <?php echo (int)($_SESSION['user_id'] ?? 0); ?>,
      username: "<?= htmlspecialchars($_SESSION['username'] ?? '') ?>",
      email:    "<?= htmlspecialchars($_SESSION['email']    ?? '') ?>",
    };
  </script>
</head>
<body class="bg-liflowBg text-stone-800 antialiased font-sans">
  <div id="toast-container" class="fixed bottom-6 right-6 z-[200] flex flex-col gap-2.5 pointer-events-none"></div>
  <div class="flex h-screen overflow-hidden">
