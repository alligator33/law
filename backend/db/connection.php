<?php
require_once __DIR__ . '/../config/config.php';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_TIMEOUT => 5, // 5 second timeout
];

try {
    // Simple SSL configuration for Neon PostgreSQL
    $dsn = sprintf(
        "pgsql:host=%s;dbname=%s;sslmode=require;connect_timeout=5",
        DB_HOST,
        DB_NAME
    );
    
    error_log("Attempting database connection to: " . DB_HOST);
    
    // Create connection
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    
    // Test the connection with timeout
    $pdo->setAttribute(PDO::ATTR_TIMEOUT, 5);
    $pdo->query('SELECT 1');
    
    error_log("Database connection successful");
    
} catch (PDOException $e) {
    error_log("Database Connection Error: " . $e->getMessage());
    error_log("Connection details: HOST=" . DB_HOST . ", DB=" . DB_NAME . ", USER=" . DB_USER);
    
    if (strpos($e->getMessage(), 'SSL') !== false) {
        error_log("SSL Error detected - Using Neon host: " . (strpos(DB_HOST, 'neon.tech') !== false ? 'Yes' : 'No'));
    }
    
    if (!headers_sent()) {
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false, 
            'message' => 'Database connection failed. Please check the error logs for details.',
            'error_type' => strpos($e->getMessage(), 'SSL') !== false ? 'ssl_error' : 'connection_error'
        ]);
    }
    exit;
}
?>