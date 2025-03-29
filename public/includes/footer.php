<?php
require_once __DIR__ . '/../../backend/utils/functions.php';
$config = getPageConfig();
$companyInfo = $config['company_info'];
?>
<footer class="bg-law-navy text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xl font-crimson mb-4"><?php echo htmlspecialchars($companyInfo['name']); ?></h3>
                <p class="text-gray-300">Providing exceptional legal services with integrity and dedication.</p>
            </div>
            <div>
                <h3 class="text-xl font-crimson mb-4">Contact</h3>
                <p class="text-gray-300"><?php echo htmlspecialchars($companyInfo['address']['line1']); ?></p>
                <?php if (!empty($companyInfo['address']['line2'])): ?>
                    <p class="text-gray-300"><?php echo htmlspecialchars($companyInfo['address']['line2']); ?></p>
                <?php endif; ?>
                <p class="text-gray-300">
                    <?php echo htmlspecialchars($companyInfo['address']['city']) . ', ' . 
                           htmlspecialchars($companyInfo['address']['state']) . ' ' . 
                           htmlspecialchars($companyInfo['address']['postal_code']); ?>
                </p>
                <p class="text-gray-300">Phone: <?php echo htmlspecialchars($companyInfo['phone']); ?></p>
                <p class="text-gray-300">Email: <?php echo htmlspecialchars($companyInfo['email']); ?></p>
            </div>
            <div>
                <h3 class="text-xl font-crimson mb-4">Connect With Us</h3>
                <div class="space-y-2">
                    <?php if (isset($companyInfo['social_media'])): ?>
                        <?php foreach ($companyInfo['social_media'] as $platform => $url): ?>
                            <a href="<?php echo htmlspecialchars($url); ?>" target="_blank" rel="noopener noreferrer" 
                               class="block text-gray-300 hover:text-law-gold transition-colors">
                                <?php echo ucfirst($platform); ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-300">
            <p>&copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars($companyInfo['name']); ?>. All rights reserved.</p>
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