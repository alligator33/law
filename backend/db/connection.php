<?php
require_once __DIR__ . '/../config/config.php';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    // Check if we're connecting to Neon PostgreSQL
    $isNeon = strpos(DB_HOST, 'neon.tech') !== false;
    
    // Construct DSN based on environment
    if ($isNeon) {
        // Production with Neon PostgreSQL
        $dsn = "pgsql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";sslmode=require";
    } else {
        // Local development
        $dsn = "pgsql:host=" . DB_HOST . ";dbname=" . DB_NAME;
    }
    
    // Create connection
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    
    // Test the connection
    $pdo->query('SELECT 1');
    
} catch (PDOException $e) {
    error_log("Database Connection Error: " . $e->getMessage());
    
    if (!headers_sent()) {
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false, 
            'message' => 'Database connection failed'
        ]);
    }
    exit;
}
?>