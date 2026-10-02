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
        id         INT AUTO_INCREMENT PRIMARY KEY,
        username   VARCHAR(50)  NOT NULL UNIQUE,
        email      VARCHAR(100) NOT NULL UNIQUE,
        password   VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB;");

    $db->exec("CREATE TABLE IF NOT EXISTS user_data (
        user_id    INT PRIMARY KEY,
        state_json LONGTEXT NOT NULL,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    ) ENGINE=InnoDB;");

} catch (PDOException $e) {
    $db_connected = false;
    $db_error     = $e->getMessage();
}
