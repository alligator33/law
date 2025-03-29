<?php
require_once __DIR__ . '/../backend/db/connection.php';

try {
    // Test the connection
    if ($pdo) {
        echo "<h2 style='color: green;'>✅ Database Connection Successful!</h2>";
        echo "<pre>";
        echo "Database Name: " . DB_NAME . "\n";
        echo "Database User: " . DB_USER . "\n";
        echo "Database Host: " . DB_HOST . "\n";
        
        // Check if we can query the database
        $stmt = $pdo->query("SELECT version()");
        $version = $stmt->fetch(PDO::FETCH_NUM)[0];
        echo "\nPostgreSQL Version: " . htmlspecialchars($version) . "\n";
        
        // Check if the contacts table exists, if not create it
        $sql = "CREATE TABLE IF NOT EXISTS contacts (
            id SERIAL PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            message TEXT NOT NULL,
            created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
        )";
        
        $pdo->exec($sql);
        echo "\n✅ Contacts table created/verified successfully!\n";
        
        // List all tables in the public schema
        $stmt = $pdo->query("SELECT tablename FROM pg_tables WHERE schemaname = 'public'");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        echo "\nAvailable Tables:\n";
        print_r($tables);
    }
    echo "</pre>";
} catch (PDOException $e) {
    echo "<h2 style='color: red;'>❌ Connection Failed!</h2>";
    echo "<pre style='color: red;'>";
    echo "Error Message: " . $e->getMessage() . "\n";
    echo "Error Code: " . $e->getCode() . "\n";
    echo "</pre>";
}
?>