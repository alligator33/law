<?php 
require_once __DIR__ . '/../backend/utils/functions.php';
include 'includes/header.php';
$config = getPageConfig();
$homeConfig = $config['pages']['home'];
?>

<!-- Hero Section -->
<section id="home" class="relative h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('<?php echo $homeConfig['hero']['background_image']; ?>');">
    <div class="absolute inset-0 bg-black/60"></div>
    <div class="container mx-auto px-4 z-10 text-center" data-aos="fade-up">
        <h1 class="text-4xl md:text-6xl font-crimson mb-6 text-white"><?php echo $homeConfig['hero']['title']; ?></h1>
        <p class="text-xl mb-8 max-w-2xl mx-auto text-gray-200"><?php echo $homeConfig['hero']['subtitle']; ?></p>
        <a href="#contact" class="bg-law-gold hover:bg-law-gold/90 text-white px-8 py-3 rounded transition-colors inline-block"><?php echo $homeConfig['hero']['cta_text']; ?></a>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <img src="https://placehold.co/600x400" alt="About Us" class="rounded-lg shadow-lg">
            </div>
            <div data-aos="fade-left">
                <h2 class="text-3xl font-crimson mb-6 text-law-navy"><?php echo $homeConfig['about']['title']; ?></h2>
                <p class="mb-6 text-gray-600"><?php echo $homeConfig['about']['content']; ?></p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="text-center p-4 bg-law-gray rounded-lg">
                        <h3 class="text-2xl font-bold text-law-gold"><?php echo $homeConfig['about']['stats']['cases_won']; ?></h3>
                        <p class="text-gray-600">Cases Won</p>
                    </div>
                    <div class="text-center p-4 bg-law-gray rounded-lg">
                        <h3 class="text-2xl font-bold text-law-gold"><?php echo $homeConfig['about']['stats']['success_rate']; ?></h3>
                        <p class="text-gray-600">Success Rate</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Practice Areas -->
<section id="practice-areas" class="py-20 bg-law-gray">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-crimson mb-12 text-center text-law-navy" data-aos="fade-up">Our Practice Areas</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($homeConfig['practice_areas'] as $index => $practice): ?>
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="text-4xl mb-4"><?php echo $practice['icon']; ?></div>
                    <h3 class="text-xl font-crimson mb-3"><?php echo $practice['title']; ?></h3>
                    <p class="text-gray-600 mb-4"><?php echo $practice['description']; ?></p>
                    <a href="/practice-areas.php#<?php echo strtolower(str_replace(' ', '-', $practice['title'])); ?>" 
                       class="text-law-gold hover:text-law-navy transition-colors inline-flex items-center">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Team Section -->
<section id="team" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-crimson mb-12 text-center text-law-navy" data-aos="fade-up">Our Expert Team</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($homeConfig['team'] as $index => $member): ?>
                <div class="text-center" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <img src="<?php echo $member['image']; ?>" alt="<?php echo $member['name']; ?>" class="w-full h-80 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-crimson mb-2"><?php echo $member['name']; ?></h3>
                    <p class="text-gray-600"><?php echo $member['role']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'includes/testimonials.php'; ?>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-crimson mb-12 text-center text-law-navy" data-aos="fade-up">Contact Us</h2>
            
            <div id="contactMessage" class="mb-6 p-4 rounded-lg hidden"></div>
            
            <form id="contactForm" class="space-y-6" data-aos="fade-up">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-gray-700 mb-2">Name</label>
                        <input type="text" id="name" name="name" required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-law-gold focus:border-law-gold">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-law-gold focus:border-law-gold">
                    </div>
                </div>
                <div>
                    <label for="message" class="block text-gray-700 mb-2">Message</label>
                    <textarea id="message" name="message" rows="6" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-law-gold focus:border-law-gold"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" 
                        class="bg-law-navy hover:bg-law-navy/90 text-white px-8 py-3 rounded-lg transition-colors inline-block">
                        Send Message
                    </button>
                </div>
            </form>

            <!-- Contact Information -->
            <div class="mt-12 pt-12 border-t border-gray-200">
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-crimson mb-4 text-law-navy">Contact Information</h3>
                        <p class="text-gray-600 mb-2">Phone: <?php echo htmlspecialchars($config['company_info']['phone']); ?></p>
                        <p class="text-gray-600 mb-2">Email: <?php echo htmlspecialchars($config['company_info']['email']); ?></p>
                        <p class="text-gray-600">
                            <?php echo htmlspecialchars($config['company_info']['address']['line1']); ?><br>
                            <?php echo htmlspecialchars($config['company_info']['address']['line2']); ?><br>
                            <?php echo htmlspecialchars($config['company_info']['address']['city']); ?>, 
                            <?php echo htmlspecialchars($config['company_info']['address']['state']); ?> 
                            <?php echo htmlspecialchars($config['company_info']['address']['postal_code']); ?>
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

<script>
document.getElementById('contactForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const messageDiv = document.getElementById('contactMessage');
    const submitButton = this.querySelector('button[type="submit"]');
    const formData = new FormData(this);
    
    // Disable submit button and show loading state
    submitButton.disabled = true;
    submitButton.innerHTML = '<span class="inline-flex items-center">Sending...<svg class="animate-spin ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg></span>';
    
    try {
        const response = await fetch('/api/contact.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        messageDiv.classList.remove('hidden', 'bg-red-100', 'bg-green-100', 'text-red-700', 'text-green-700');
        
        if (response.ok && result.success) {
            messageDiv.classList.add('bg-green-100', 'text-green-700');
            this.reset();
        } else {
            messageDiv.classList.add('bg-red-100', 'text-red-700');
        }
        
        messageDiv.textContent = result.message;
        messageDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        
    } catch (error) {
        messageDiv.classList.remove('hidden', 'bg-green-100', 'text-green-700');
        messageDiv.classList.add('bg-red-100', 'text-red-700');
        messageDiv.textContent = 'An error occurred. Please try again later.';
        messageDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    } finally {
        submitButton.disabled = false;
        submitButton.innerHTML = 'Send Message';
    }
});
</script>

<?php include 'includes/footer.php'; ?>