<?php
require_once '../backend/db/connection.php';

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
        echo "\nMySQL Version: " . htmlspecialchars($version) . "\n";
        
        // Test creating the contacts table if it doesn't exist
        $sql = "CREATE TABLE IF NOT EXISTS contacts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            message TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        
        $pdo->exec($sql);
        echo "\n✅ Contacts table created/verified successfully!\n";
        
        // Check if we can list tables
        $stmt = $pdo->query("SHOW TABLES");
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