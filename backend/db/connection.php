<?php
require_once __DIR__ . '/../config/config.php';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];

try {
    // Determine if we're in production
    $isProduction = !isset($_SERVER['SERVER_PORT']) || $_SERVER['SERVER_PORT'] !== '8000';
    
    if ($isProduction) {
        // Production: Include endpoint parameter for environments without SNI support
        $dsn = sprintf(
            "pgsql:host=%s;dbname=%s;sslmode=require?options=endpoint%%3Dep-winter-heart-a5mhn4qz",
            DB_HOST,
            DB_NAME
        );
    } else {
        // Local: Use simple connection string
        $dsn = sprintf(
            "pgsql:host=%s;dbname=%s;sslmode=require",
            DB_HOST,
            DB_NAME
        );
    }

    // Create connection
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);

    // Test the connection
    $pdo->query('SELECT 1');

} catch (PDOException $e) {
    error_log("Database Connection Error: " . $e->getMessage());
    error_log("Connection DSN (sanitized): " . preg_replace('/password=([^;]*)/', 'password=***', $dsn));

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