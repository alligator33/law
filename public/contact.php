<?php
require_once '../backend/db/connection.php';
require_once '../backend/utils/functions.php';
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$success = $error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeInput($_POST['name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $message = sanitizeInput($_POST['message'] ?? '');

    // Validation
    if (empty($name) || empty($email) || empty($message)) {
        $error = "Please fill in all fields.";
    } elseif (!validateEmail($email)) {
        $error = "Please enter a valid email address.";
    } else {
        try {
            // Save to database
            $stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $message]);

            // Send email using PHPMailer
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Update with your SMTP host
            $mail->SMTPAuth = true;
            $mail->Username = EMAIL_TO; // From config
            $mail->Password = ''; // Add your app password here
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom($email, $name);
            $mail->addAddress(EMAIL_TO);
            $mail->Subject = 'New Contact Form Submission';
            $mail->Body = "Name: $name\nEmail: $email\nMessage: $message";

            $mail->send();
            $success = "Thank you! Your message has been sent successfully.";
            
            // Clear form
            $name = $email = $message = '';
            
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
            $error = "Sorry, there was an error sending your message. Please try again later.";
        }
    }
}
?>

<?php include '../public/includes/header.php'; ?>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-3xl font-crimson mb-8 text-center text-law-navy">Contact Us</h1>
            
            <?php if ($success): ?>
                <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($error): ?>
                <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="contact.php" method="POST" class="space-y-6">
                <div>
                    <label for="name" class="block text-gray-700 mb-2">Name</label>
                    <input type="text" id="name" name="name" required 
                           value="<?php echo htmlspecialchars($name ?? ''); ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-law-gold focus:border-law-gold">
                </div>
                
                <div>
                    <label for="email" class="block text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" required 
                           value="<?php echo htmlspecialchars($email ?? ''); ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-law-gold focus:border-law-gold">
                </div>
                
                <div>
                    <label for="message" class="block text-gray-700 mb-2">Message</label>
                    <textarea id="message" name="message" rows="6" required 
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-law-gold focus:border-law-gold"
                    ><?php echo htmlspecialchars($message ?? ''); ?></textarea>
                </div>
                
                <div class="text-center">
                    <button type="submit" 
                            class="bg-law-navy hover:bg-law-navy/90 text-white px-8 py-3 rounded-lg transition-colors inline-block">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php include '../public/includes/footer.php'; ?>