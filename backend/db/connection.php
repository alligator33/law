<?php
require_once __DIR__ . '/../config/config.php';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    // Construct Neon database DSN with SSL mode
    $dsn = "pgsql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";sslmode=require";
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    error_log("Database Connection Error: " . $e->getMessage());
    if (!headers_sent()) {
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    }
    exit;
}
?>