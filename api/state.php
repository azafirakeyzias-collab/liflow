<?php
/**
 * ========================================================
 * LIFLOW - State Management API
 * Handles: save_state, get_state
 * Supports: MySQL storage with automatic Session fallback
 * ========================================================
 */

require_once __DIR__ . '/../config/database.php';

header('Content-Type: application/json');

$action = $_GET['action'] ?? $_GET['api'] ?? '';

// ──────────────────────────────────────────────────────────────
// SAVE STATE
// ──────────────────────────────────────────────────────────────
if ($action === 'save_state') {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'Autentikasi ditolak.']);
        exit;
    }

    $input      = json_decode(file_get_contents('php://input'), true);
    $state_data = $input['state'] ?? [];
    $state_json = json_encode($state_data);

    // Always keep session updated
    $_SESSION['user_state'] = $state_data;

    if ($db_connected && $db) {
        try {
            $stmt = $db->prepare(
                "INSERT INTO user_data (user_id, state_json) VALUES (?, ?)
                 ON DUPLICATE KEY UPDATE state_json = ?"
            );
            $stmt->execute([$_SESSION['user_id'], $state_json, $state_json]);
            echo json_encode(['success' => true]);
            exit;
        } catch (Exception $e) {
            // fallback returns success because session is saved
        }
    }

    echo json_encode(['success' => true, 'storage' => 'session']);
    exit;
}

// ──────────────────────────────────────────────────────────────
// GET STATE
// ──────────────────────────────────────────────────────────────
if ($action === 'get_state') {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'Sesi tidak aktif.']);
        exit;
    }

    if ($db_connected && $db) {
        try {
            $stmt = $db->prepare("SELECT state_json FROM user_data WHERE user_id = ?");
            $stmt->execute([$_SESSION['user_id']]);
            $data = $stmt->fetch();
            if ($data && !empty($data['state_json'])) {
                echo json_encode([
                    'success' => true,
                    'state'   => json_decode($data['state_json'], true),
                ]);
                exit;
            }
        } catch (Exception $e) {
            // fallback to session
        }
    }

    $state = $_SESSION['user_state'] ?? null;
    echo json_encode([
        'success' => true,
        'state'   => $state,
    ]);
    exit;
}

echo json_encode(['success' => false, 'message' => 'Action tidak dikenal.']);
