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
     
            </div>
        </div>
    </section>

    <!-- Individual Practice Areas -->
    <?php 
    $practiceAreas = [
        [
            'image' => '/assets/images/practices/accident.jpg',
            'title' => 'Accident Law',
            'description' => 'We provide expert legal services for accident-related cases. Our team is dedicated to ensuring that victims of accidents receive the justice and compensation they deserve. From car accidents to workplace injuries, we handle every case with diligence and care, guiding you through the legal process with expertise and compassion.'
        ],
        [
            'image' => '/assets/images/practices/family.jpg',
            'title' => 'Family Law',
            'description' => 'Helping families resolve legal matters with care and expertise. Whether it is divorce, child custody, or adoption, our family law attorneys are here to provide support and guidance. We understand the emotional challenges involved and strive to achieve outcomes that are in the best interest of our clients and their families.'
        ],
        [
            'image' => '/assets/images/practices/business.jpg',
            'title' => 'Business Law',
            'description' => 'Providing legal solutions for businesses of all sizes. From startups to established corporations, we offer comprehensive legal services to help businesses navigate complex legal landscapes. Our expertise includes contract drafting, compliance, mergers, and acquisitions, ensuring your business operates smoothly and efficiently.'
        ],
        [
            'image' => '/assets/images/practices/criminal.jpg',
            'title' => 'Criminal Law',
            'description' => 'Expert representation in criminal cases to protect your rights. Our criminal defense attorneys are committed to providing a strong defense for individuals facing criminal charges. We work tirelessly to ensure that your rights are upheld and that you receive a fair trial.'
        ],
        [
            'image' => '/assets/images/practices/personal_injury.jpg',
            'title' => 'Personal Injury',
            'description' => 'Compassionate legal support for personal injury claims. If you have been injured due to someone else’s negligence, our personal injury lawyers are here to help. We fight to secure the compensation you need to recover and move forward with your life.'
        ],
        [
            'image' => '/assets/images/practices/trade_finace.jpg',
            'title' => 'Trade Finance',
            'description' => 'Comprehensive legal services for trade and finance matters. Our team provides expert advice and representation in trade finance, helping businesses manage risks and seize opportunities in the global market. From letters of credit to international trade agreements, we have you covered.'
        ]
    ];

    $index = 0;
    foreach ($practiceAreas as $area): ?>
    <section id="<?php echo strtolower(str_replace(' ', '-', $area['title'])); ?>" class="py-20 <?php echo $index % 2 === 0 ? 'bg-white' : 'bg-law-gray'; ?>">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-crimson text-law-navy mb-8"><?php echo $area['title']; ?></h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <img src="<?php echo $area['image']; ?>" alt="<?php echo $area['title']; ?>" class="rounded-lg shadow-lg mb-6">
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
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for the anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').slice(1);
            const targetSection = document.getElementById(targetId);
            
            if (targetSection) {
                const headerOffset = 80; // Adjust this value based on your header height
                const elementPosition = targetSection.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});
</script>

<style>
/* Practice area navigation styling */
.container .flex {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem;
    padding: 1rem 0;
    max-width: 1200px;
    margin: 0 auto;
}

.container .flex a {
    flex: 0 1 auto;
    min-width: 200px;
    display: inline-block;
    text-align: center;
    color: white;
    font-weight: 600;
    padding: 1rem 1.5rem;
    border-radius: 0.5rem;
    background-color: rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    text-decoration: none;
    margin: 0.5rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.container .flex a:hover {
    background-color: var(--law-gold, #FFD700);
    color: var(--law-navy, #1A202C);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

@media (max-width: 768px) {
    .container .flex a {
        min-width: 160px;
        font-size: 0.95rem;
    }
}
</style>

<?php include 'includes/footer.php'; ?>