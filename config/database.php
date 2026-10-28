<?php
/**
 * ========================================================
 * LIFLOW - Database Configuration
 * ========================================================
 */

// Konfigurasi koneksi MySQL (WAMP default)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'liflow_db');
define('DB_CHARSET', 'utf8');

// Konfigurasi WhatsApp LIFLOW
define('WHATSAPP_NUMBER', '6285742546223');
define('WHATSAPP_DISPLAY', '0857-4254-6223');
define('WHATSAPP_RAW_NUMBER', '085742546223');

if (!function_exists('get_whatsapp_url')) {
    function get_whatsapp_url($message = 'Halo LIFLOW, saya ingin bertanya seputar Life OS...') {
        return 'https://wa.me/' . WHATSAPP_NUMBER . '?text=' . rawurlencode($message);
    }
}

ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db_connected = false;
$db_error     = '';
$db           = null;

try {
    // Attempt auto-create database if MySQL server is available
    $server_dsn = "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET;
    $server_pdo = new PDO($server_dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 2,
    ]);
    $server_pdo->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $db  = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_TIMEOUT            => 2,
    ]);
    $db_connected = true;

    // AUTO-INSTALLER: Buat tabel jika belum ada
    $db->exec("CREATE TABLE IF NOT EXISTS users (
        id              INT AUTO_INCREMENT PRIMARY KEY,
        username        VARCHAR(50)  NOT NULL UNIQUE,
        email           VARCHAR(100) NOT NULL UNIQUE,
        password        VARCHAR(255) NOT NULL,
        is_premium      TINYINT(1) DEFAULT 0,
        plan_type       VARCHAR(20) DEFAULT 'free',
        premium_expires DATETIME NULL,
        created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB;");

    // Add columns if table already existed previously
    try { $db->exec("ALTER TABLE users ADD COLUMN is_premium TINYINT(1) DEFAULT 0"); } catch (Exception $e) {}
    try { $db->exec("ALTER TABLE users ADD COLUMN plan_type VARCHAR(20) DEFAULT 'free'"); } catch (Exception $e) {}
    try { $db->exec("ALTER TABLE users ADD COLUMN premium_expires DATETIME NULL"); } catch (Exception $e) {}

    $db->exec("CREATE TABLE IF NOT EXISTS user_data (
        user_id    INT PRIMARY KEY,
        state_json LONGTEXT NOT NULL,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    ) ENGINE=InnoDB;");

    $db->exec("CREATE TABLE IF NOT EXISTS transactions (
        id             INT AUTO_INCREMENT PRIMARY KEY,
        order_id       VARCHAR(64) NOT NULL UNIQUE,
        user_id        INT NULL,
        customer_name  VARCHAR(100) NOT NULL,
        customer_email VARCHAR(100) NOT NULL,
        customer_phone VARCHAR(30) NULL,
        plan_name      VARCHAR(50) NOT NULL,
        duration       VARCHAR(20) NOT NULL,
        amount         INT NOT NULL,
        payment_method VARCHAR(50) NOT NULL,
        payment_status VARCHAR(30) DEFAULT 'pending',
        transaction_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        paid_at        DATETIME NULL,
        proof_file     VARCHAR(255) NULL,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
    ) ENGINE=InnoDB;");

    // Add proof_file column if table already exists
    try { $db->exec("ALTER TABLE transactions ADD COLUMN proof_file VARCHAR(255) NULL"); } catch (Exception $e) {}

} catch (PDOException $e) {
    $db_connected = false;
    $db_error     = $e->getMessage();
}
