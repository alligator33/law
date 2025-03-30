<?php 
require_once __DIR__ . '/../backend/utils/functions.php';
include 'includes/header.php';
$config = getPageConfig();
?>

<main class="pt-20">
    <!-- Practice Areas Hero -->
    <section class="bg-law-navy text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-crimson mb-8">Our Practice Areas</h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">Comprehensive legal expertise across multiple disciplines to serve your needs</p>
            <div class="mt-12 flex flex-wrap justify-center gap-4">
                <!-- Dynamic Navigation Links -->
                <?php foreach ($config['pages']['home']['practice_areas'] as $area): ?>
                    <a href="#<?php echo strtolower(str_replace(' ', '-', $area['title'])); ?>" class="bg-white/10 hover:bg-law-gold transition-colors px-6 py-3 rounded-lg">
                        <?php echo $area['title']; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Individual Practice Areas -->
    <?php 
    $images = [
        'accident.jpg',
        'business.jpg',
        'criminal.jpg',
        'family.jpg',
        'personal_injury.jpg',
        'trade_finace.jpg'
    ];
    $index = 0;
    foreach ($config['pages']['home']['practice_areas'] as $area): ?>
    <section id="<?php echo strtolower(str_replace(' ', '-', $area['title'])); ?>" class="py-20 <?php echo $index % 2 === 0 ? 'bg-white' : 'bg-law-gray'; ?>">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-crimson text-law-navy mb-8"><?php echo $area['title']; ?></h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <img src="/public/assets/images/practices/<?php echo $images[$index]; ?>" alt="<?php echo $area['title']; ?>" class="rounded-lg shadow-lg mb-6">
                    </div>
                    <div>
                        <p class="text-gray-600 mb-6"><?php echo $area['description']; ?></p>
                        <p class="text-gray-600">Our team provides unparalleled expertise in <?php echo strtolower($area['title']); ?>, ensuring that every client receives personalized attention and effective solutions tailored to their unique needs. Whether you are navigating complex legal challenges or seeking proactive advice, we are here to guide you every step of the way.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $index++; endforeach; ?>

    <!-- Call to Action -->
    <section class="py-20 bg-law-navy text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-crimson mb-6">Need Legal Assistance?</h2>
            <p class="text-gray-300 mb-8 max-w-2xl mx-auto">Contact us today for a consultation about your legal needs. Our experienced team is ready to help.</p>
            <a href="/contact.php" class="bg-law-gold hover:bg-law-gold/90 text-white px-8 py-3 rounded-lg transition-colors inline-block">Contact Us</a>
        </div>
    </section>
</main>

<script>
// Smooth scrolling for the anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const section = document.querySelector(this.getAttribute('href'));
        if (section) {
            section.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

// Highlight current section in navigation
window.addEventListener('scroll', function() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.container a[href^="#"]');
    
    let currentSection = '';
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (pageYOffset >= sectionTop - 150) {
            currentSection = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('text-law-gold');
        if (link.getAttribute('href').substring(1) === currentSection) {
            link.classList.add('text-law-gold');
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>