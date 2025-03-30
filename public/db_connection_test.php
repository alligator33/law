<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

try {
    // Step 1: Test config loading
    echo json_encode(['step' => 1, 'message' => 'Testing config loading']) . "\n";
    require_once __DIR__ . '/../backend/config/config.php';
    
    // Output configuration (without sensitive data)
    echo json_encode([
        'step' => 1.1,
        'config' => [
            'host' => DB_HOST,
            'database' => DB_NAME,
            'user' => DB_USER,
            'port' => '5432'
        ]
    ]) . "\n";

    // Step 2: Test basic PHP extensions
    echo json_encode([
        'step' => 2,
        'extensions' => [
            'pdo' => extension_loaded('pdo'),
            'pdo_pgsql' => extension_loaded('pdo_pgsql'),
            'openssl' => extension_loaded('openssl')
        ]
    ]) . "\n";

    // Step 3: Test DNS resolution
    echo json_encode(['step' => 3, 'message' => 'Testing DNS resolution']) . "\n";
    $ips = gethostbynamel(DB_HOST);
    echo json_encode([
        'step' => 3.1,
        'dns_results' => $ips ? $ips : 'DNS resolution failed'
    ]) . "\n";

    // Step 4: Test basic connection
    echo json_encode(['step' => 4, 'message' => 'Testing basic connection']) . "\n";
    
    // Try different SSL modes
    $sslModes = ['require', 'prefer', 'disable'];
    $successful_mode = null;
    
    foreach ($sslModes as $sslmode) {
        try {
            echo json_encode(['step' => 4.1, 'testing_ssl_mode' => $sslmode]) . "\n";
            
            $dsn = sprintf(
                "pgsql:host=%s;dbname=%s;sslmode=%s",
                DB_HOST,
                DB_NAME,
                $sslmode
            );
            
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
            $pdo->query('SELECT 1');
            
            $successful_mode = $sslmode;
            echo json_encode([
                'step' => 4.2,
                'message' => 'Connection successful with sslmode=' . $sslmode
            ]) . "\n";
            break;
            
        } catch (PDOException $e) {
            echo json_encode([
                'step' => 4.3,
                'ssl_mode' => $sslmode,
                'error' => $e->getMessage()
            ]) . "\n";
        }
    }

    // Final status
    if ($successful_mode) {
        echo json_encode([
            'success' => true,
            'message' => 'Database connection test completed successfully',
            'working_ssl_mode' => $successful_mode
        ]) . "\n";
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'All connection attempts failed'
        ]) . "\n";
    }

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine()
    ]) . "\n";
}