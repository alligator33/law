<?php
require_once __DIR__ . '/../config/config.php';

function initializeDatabase() {
    try {
        // Create a new PDO instance
        $pdo = new PDO("sqlite:" . DB_FILE);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Read and execute the schema file
        $schema = file_get_contents(__DIR__ . '/migrations/schema.sql');
        $pdo->exec($schema);
        
        echo "Database initialized successfully\n";
        return true;
    } catch (PDOException $e) {
        echo "Error initializing database: " . $e->getMessage() . "\n";
        return false;
    }
}

// Run initialization if this script is executed directly
if (php_sapi_name() === 'cli' && basename(__FILE__) === basename($_SERVER['PHP_SELF'])) {
    initializeDatabase();
}