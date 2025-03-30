<?php
require_once __DIR__ . '/connection.php';

try {
    // Read the schema file
    $schema = file_get_contents(__DIR__ . '/migrations/schema.sql');
    
    // Execute the schema
    $pdo->exec($schema);
    
    echo "✅ Database tables created successfully!\n";
    
    // Verify tables exist
    $result = $pdo->query("SELECT tablename FROM pg_catalog.pg_tables WHERE schemaname = 'public'");
    $tables = $result->fetchAll(PDO::FETCH_COLUMN);
    
    echo "\nAvailable tables:\n";
    print_r($tables);
    
} catch (PDOException $e) {
    echo "❌ Error initializing database: " . $e->getMessage() . "\n";
    exit(1);
}