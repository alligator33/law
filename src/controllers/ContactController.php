<?php
namespace App\Controllers;

class ContactController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function handleSubmission($data) {
        $response = ['success' => false, 'message' => ''];

        try {
            $name = htmlspecialchars(trim($data['name']));
            $email = htmlspecialchars(trim($data['email']));
            $message = htmlspecialchars(trim($data['message']));

            if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $stmt = $this->pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
                $stmt->execute([$name, $email, $message]);

                // Send email notification
                require_once __DIR__ . '/../mail/send_mail.php';
                if (sendMail($name, $email, $message)) {
                    $response = [
                        'success' => true,
                        'message' => 'Message sent successfully!'
                    ];
                } else {
                    $response['message'] = 'Message saved but email notification failed.';
                }
            } else {
                $response['message'] = 'Please fill in all fields correctly.';
            }
        } catch (Exception $e) {
            $response['message'] = 'An error occurred. Please try again later.';
            error_log($e->getMessage());
        }

        return $response;
    }
}