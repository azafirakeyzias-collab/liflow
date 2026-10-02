<?php
/**
 * ========================================================
 * LIFLOW - Main Entry Point
 * Routes API calls and assembles the page from partials.
 * Authenticated users → App Dashboard
 * Guest users        → Public Marketing Site
 * ========================================================
 */

require_once __DIR__ . '/config/database.php';

// ── API Routing ──────────────────────────────────────────
if (isset($_GET['api'])) {
    $action = $_GET['api'];
    if (in_array($action, ['register', 'login', 'logout'])) {
        require __DIR__ . '/api/auth.php';
    } elseif (in_array($action, ['save_state', 'get_state'])) {
        require __DIR__ . '/api/state.php';
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Unknown API action.']);
    }
    exit;
}

// ── Session Check: Route to correct interface ─────────────
$is_logged_in = isset($_SESSION['user_id']);
?>
<?php if ($is_logged_in): ?>
  <?php require __DIR__ . '/includes/app_header.php'; ?>
  <?php require __DIR__ . '/views/app.php'; ?>
  <?php require __DIR__ . '/includes/app_footer.php'; ?>
<?php else: ?>
  <?php require __DIR__ . '/includes/header.php'; ?>
  <?php require __DIR__ . '/views/landing.php'; ?>
  <?php require __DIR__ . '/views/about.php'; ?>
  <?php require __DIR__ . '/views/features.php'; ?>
  <?php require __DIR__ . '/views/pricing.php'; ?>
  <?php require __DIR__ . '/views/blog.php'; ?>
  <?php require __DIR__ . '/includes/footer.php'; ?>
<?php endif; ?>