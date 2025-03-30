<?php
require_once __DIR__ . '/../config/config.php';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_TIMEOUT => 3  // 3 second timeout
];

try {
    // Check if we're connecting to Neon PostgreSQL
    $isNeon = strpos(DB_HOST, 'neon.tech') !== false;
    
    if ($isNeon) {
        // Production: Use direct connection with SSL and timeout
        $dsn = sprintf(
            "pgsql:host=%s;port=5432;dbname=%s;sslmode=require;connect_timeout=3",
            DB_HOST,
            DB_NAME
        );
        
        // Add SSL verification options
        $options[PDO::PGSQL_ATTR_SSL_MODE] = PDO::PGSQL_SSL_REQUIRE;
        
        error_log("Connecting to Neon with SSL required");
    } else {
        // Local development
        $dsn = "pgsql:host=" . DB_HOST . ";dbname=" . DB_NAME;
        error_log("Connecting to local database");
    }
    
    error_log("Attempting database connection to: " . DB_HOST);
    
    // Single connection attempt with timeout
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    
    // Test the connection
    $pdo->query('SELECT 1');
    error_log("Database connection successful");
    
} catch (PDOException $e) {
    error_log("Database Connection Error Details:");
    error_log("Error Message: " . $e->getMessage());
    error_log("Error Code: " . $e->getCode());
    error_log("Connection Parameters:");
    error_log("Host: " . DB_HOST);
    error_log("Database: " . DB_NAME);
    error_log("User: " . DB_USER);
    error_log("DSN: " . preg_replace('/password=([^;]*)/', 'password=****', $dsn));
    
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