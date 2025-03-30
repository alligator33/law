<?php
require_once __DIR__ . '/../config/config.php';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];

try {
    // Include endpoint ID in the connection string for SNI workaround
    $endpointId = 'ep-winter-heart-a5mhn4qz';
    $dsn = sprintf(
        "pgsql:host=%s;dbname=%s;sslmode=require;options=--client_encoding=UTF8 endpoint=%s",
        DB_HOST,
        DB_NAME,
        $endpointId
    );
    
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
            'message' => 'Database connection failed',
            'debug' => [
                'error' => $e->getMessage()
            ]
        ]);
    }
    exit;
}
?>