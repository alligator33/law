<?php
require_once __DIR__ . '/connection.php';
require_once __DIR__ . '/../config/config.php';

try {
    // First, ensure the table exists
    $schema = file_get_contents(__DIR__ . '/migrations/schema.sql');
    $pdo->exec($schema);

    // Check if we already have company info
    $stmt = $pdo->query("SELECT COUNT(*) FROM company_info");
    $count = $stmt->fetchColumn();

    if ($count == 0) {
        // Insert default company info
        $stmt = $pdo->prepare("
            INSERT INTO company_info (
                address_line1, 
                address_line2, 
                city, 
                state, 
                postal_code, 
                phone, 
                email
            ) VALUES (
                :address_line1,
                :address_line2,
                :city,
                :state,
                :postal_code,
                :phone,
                :email
            )
        ");

        $stmt->execute([
            'address_line1' => '123 Legal Street',
            'address_line2' => '',
            'city' => 'New York',
            'state' => 'NY',
            'postal_code' => '10001',
            'phone' => '(555) 123-4567',
            'email' => 'info@lawfirm.com'
        ]);

        echo "Company info initialized successfully\n";
    } else {
        echo "Company info already exists\n";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}