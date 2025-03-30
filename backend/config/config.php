<?php
// Load environment variables if .env exists
$envFile = __DIR__ . '/../../.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '#') === 0) continue;
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
        putenv(sprintf('%s=%s', trim($name), trim($value)));
    }
}

// Database credentials for Neon PostgreSQL
define('DB_HOST', 'ep-winter-heart-a5mhn4qz-pooler.us-east-2.aws.neon.tech');
define('DB_NAME', 'neondb');
define('DB_USER', 'neondb_owner');
define('DB_PASS', 'npg_lN90UbfkBshI');

// Email settings
define('EMAIL_TO', 'norepy@lexfirmglobal.com');
define('EMAIL_FROM', 'norepy@lexfirmglobal.com');
define('SMTP_HOST', 'premium151.web-hosting.com');
define('SMTP_USER', 'norepy@lexfirmglobal.com');
define('SMTP_PASS', '%)Js6x*35Ly]');
define('SMTP_PORT', '465');
define('SMTP_SECURE', 'ssl');

// Other constants
define('BASE_URL', 'https://lexfirmglobal.com');