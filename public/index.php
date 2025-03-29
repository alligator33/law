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
                    <p class="text-gray-600"><?php echo $practice['description']; ?></p>
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

<!-- Testimonials -->
<section class="py-20 bg-law-navy text-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-crimson mb-12 text-center" data-aos="fade-up">Client Testimonials</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach ($homeConfig['testimonials'] as $index => $testimonial): ?>
                <div class="bg-white/10 p-6 rounded-lg" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <p class="mb-4 italic">"<?php echo $testimonial['text']; ?>"</p>
                    <p class="text-law-gold">- <?php echo $testimonial['author']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-crimson mb-12 text-center text-law-navy" data-aos="fade-up"><?php echo $config['pages']['contact']['form']['title']; ?></h2>
            
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
        </div>
    </div>
</section>

<script>
document.getElementById('contactForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const messageDiv = document.getElementById('contactMessage');
    const submitButton = this.querySelector('button[type="submit"]');
    const formData = new FormData(this);
    
    submitButton.disabled = true;
    submitButton.innerHTML = 'Sending...';
    
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
        
    } catch (error) {
        messageDiv.classList.remove('hidden', 'bg-green-100', 'text-green-700');
        messageDiv.classList.add('bg-red-100', 'text-red-700');
        messageDiv.textContent = '<?php echo $config['pages']['contact']['form']['error_message']; ?>';
    }
    
    submitButton.disabled = false;
    submitButton.innerHTML = 'Send Message';
    
    messageDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
});
</script>

<?php include 'includes/footer.php'; ?>