<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../backend/db/connection.php';
require_once __DIR__ . '/../../backend/controllers/ContactController.php';

use App\Controllers\ContactController;

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Get POST data
$data = json_decode(file_get_contents('php://input'), true);
if (!$data) {
    $data = $_POST;
}

// Handle the submission
$controller = new ContactController($pdo);
$response = $controller->handleSubmission($data);

echo json_encode($response);