<?php
require_once __DIR__ . '/../../backend/db/connection.php';
require_once __DIR__ . '/../../backend/utils/functions.php';

$companyInfo = getCompanyInfo($pdo);

// Use database info if available, otherwise use defaults
$info = $companyInfo
?>
<footer class="bg-law-navy text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xl font-crimson mb-4">Law Firm</h3>
                <p class="text-gray-300">Providing exceptional legal services with integrity and dedication.</p>
            </div>
            <div>
                <h3 class="text-xl font-crimson mb-4">Contact</h3>
                <p class="text-gray-300"><?php echo htmlspecialchars($info['address_line1']); ?></p>
                <?php if (!empty($info['address_line2'])): ?>
                    <p class="text-gray-300"><?php echo htmlspecialchars($info['address_line2']); ?></p>
                <?php endif; ?>
                <p class="text-gray-300"><?php echo htmlspecialchars($info['city']) . ', ' . htmlspecialchars($info['state']) . ' ' . htmlspecialchars($info['postal_code']); ?></p>
                <p class="text-gray-300">Phone: <?php echo htmlspecialchars($info['phone']); ?></p>
                <p class="text-gray-300">Email: <?php echo htmlspecialchars($info['email']); ?></p>
            </div>
            <div>
                <h3 class="text-xl font-crimson mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="#about" class="text-gray-300 hover:text-law-gold transition-colors">About Us</a></li>
                    <li><a href="#practice-areas" class="text-gray-300 hover:text-law-gold transition-colors">Practice Areas</a></li>
                    <li><a href="#team" class="text-gray-300 hover:text-law-gold transition-colors">Our Team</a></li>
                    <li><a href="#contact" class="text-gray-300 hover:text-law-gold transition-colors">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-300">
            <p>&copy; <?php echo date("Y"); ?> Law Firm. All rights reserved.</p>
        </div>
    </div>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    });
</script>
</body>
</html>