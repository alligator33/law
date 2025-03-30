<?php
require_once __DIR__ . '/../config/config.php';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    // Construct basic DSN with SSL required and timeout
    $dsn = sprintf(
        "pgsql:host=%s;dbname=%s;sslmode=require;connect_timeout=5",
        DB_HOST,
        DB_NAME
    );
    
    error_log("Attempting database connection to: " . DB_HOST);
    
    // Create connection
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    
    // Test the connection
    $pdo->query('SELECT 1');
    error_log("Database connection successful");
    
} catch (PDOException $e) {
    error_log("Database Connection Error Details:");
    error_log("Error Message: " . $e->getMessage());
    error_log("Error Code: " . $e->getCode());
    error_log("Connection Parameters (without password):");
    error_log("Host: " . DB_HOST);
    error_log("Database: " . DB_NAME);
    error_log("User: " . DB_USER);
    
    if (!headers_sent()) {
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false, 
            'message' => 'Database connection failed',
            'debug' => [
                'error' => $e->getMessage(),
                'code' => $e->getCode()
            ]
        ]);
    }
    exit;
}
?>