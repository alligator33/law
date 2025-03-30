<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../backend/db/connection.php';

try {
    // Connection is already established in connection.php
    if ($pdo) {
        echo "✅ Database Connection Successful!\n";
        echo "Database Host: " . DB_HOST . "\n";
        
        // Test query
        $stmt = $pdo->query("SELECT version()");
        $version = $stmt->fetch(PDO::FETCH_NUM)[0];
        echo "PostgreSQL Version: " . $version . "\n";
        
        // Test if contacts table exists
        try {
            $stmt = $pdo->query("SELECT COUNT(*) FROM contacts");
            $count = $stmt->fetchColumn();
            echo "Number of contact entries: " . $count . "\n";
        } catch (PDOException $e) {
            echo "Contacts table not found - will be created on first use.\n";
        }
    }
} catch (PDOException $e) {
    echo "❌ Connection Failed!\n";
    echo "Error: " . $e->getMessage() . "\n";
}
?>