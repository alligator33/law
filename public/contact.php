<?php
require_once '../backend/db/connection.php';
require_once '../backend/utils/functions.php';
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$success = $error = '';
$name = $email = $message = '';

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
            $mail->Host = SMTP_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USER;
            $mail->Password = SMTP_PASS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = SMTP_PORT;
            
            // Additional security options
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => true,
                    'verify_peer_name' => true,
                    'allow_self_signed' => false
                )
            );

            $mail->setFrom(EMAIL_FROM, $name);
            $mail->addAddress(EMAIL_TO);
            $mail->Subject = 'New Contact Form Submission';
            $mail->Body = "Name: $name\nEmail: $email\nMessage: $message";

            $mail->send();
            $success = "Thank you! Your message has been sent successfully.";
            
            // Clear form after successful submission
            $name = $email = $message = '';
            
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
            $error = "Sorry, there was an error sending your message. Please try again later.";
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<main class="pt-20">
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-4xl font-crimson mb-8 text-center text-law-navy">Contact Us</h1>
                
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
                               value="<?php echo htmlspecialchars($name); ?>"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-law-gold focus:border-law-gold">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" required 
                               value="<?php echo htmlspecialchars($email); ?>"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-law-gold focus:border-law-gold">
                    </div>
                    
                    <div>
                        <label for="message" class="block text-gray-700 mb-2">Message</label>
                        <textarea id="message" name="message" rows="6" required 
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-law-gold focus:border-law-gold"
                        ><?php echo htmlspecialchars($message); ?></textarea>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" 
                                class="bg-law-navy hover:bg-law-navy/90 text-white px-8 py-3 rounded-lg transition-colors inline-block">
                            Send Message
                        </button>
                    </div>
                </form>

                <div class="mt-12 pt-12 border-t border-gray-200">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-crimson mb-4 text-law-navy">Contact Information</h3>
                            <p class="text-gray-600 mb-2">Phone: (555) 123-4567</p>
                            <p class="text-gray-600 mb-2">Email: info@lexfirmglobal.com</p>
                            <p class="text-gray-600">
                                123 Legal Street<br>
                                Suite 100<br>
                                New York, NY 10001
                            </p>
                        </div>
                        <div>
                            <h3 class="text-xl font-crimson mb-4 text-law-navy">Business Hours</h3>
                            <p class="text-gray-600 mb-2">Monday - Friday: 9:00 AM - 6:00 PM</p>
                            <p class="text-gray-600">Saturday - Sunday: Closed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>