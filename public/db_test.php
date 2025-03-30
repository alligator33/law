<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    echo "Starting pooled connection test...\n";
    
    // Try pooled connection on port 5433
    $host = 'ep-winter-heart-a5mhn4qz-pooler.us-east-2.aws.neon.tech';
    $port = 5433;
    $dbname = 'neondb';
    $user = 'neondb_owner';
    $pass = 'npg_lN90UbfkBshI';
    
    echo "Connecting to: $host on port $port\n";
    
    // Basic PDO connection with explicit port
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    
    echo "Connection established!\n";
    
    // Test query
    $result = $pdo->query('SELECT NOW()')->fetch(PDO::FETCH_COLUMN);
    echo "Current database time: $result\n";
    
    echo "Test completed successfully!\n";
    
} catch (Exception $e) {
    echo "Error occurred:\n";
    echo $e->getMessage() . "\n";
    echo "Connection details used:\n";
    echo "Host: $host\n";
    echo "Port: $port\n";
    echo "Database: $dbname\n";
    echo "PHP Version: " . PHP_VERSION . "\n";
    echo "Extensions loaded: " . implode(', ', get_loaded_extensions()) . "\n";
    
    // Try to check if port is blocked
    $fp = @fsockopen($host, $port, $errno, $errstr, 5);
    if (!$fp) {
        echo "\nPort test result:\n";
        echo "Port $port appears to be blocked (Error: $errno - $errstr)\n";
    } else {
        fclose($fp);
        echo "\nPort test result:\n";
        echo "Port $port appears to be open\n";
    }
}