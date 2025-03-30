<?php
require_once __DIR__ . '/../../../backend/utils/functions.php';
$config = getPageConfig();
$homeConfig = $config['pages']['home'];

$testimonials = [
    [
        'image' => '/assets/images/clients/v3_0019661.jpg',
        'name' => 'Alice Johnson',
        'role' => 'Accident Law Client',
        'quote' => 'Ensaf provided exceptional support during my accident case. Highly recommend!'
    ],
    [
        'image' => '/assets/images/clients/v3_0052333.jpg',
        'name' => 'Michael Brown',
        'role' => 'Family Law Client',
        'quote' => 'The team at Ensaf helped me resolve my family legal matters with care and professionalism.'
    ],
    [
        'image' => '/assets/images/clients/v3_0221775.jpg',
        'name' => 'Sophia Davis',
        'role' => 'Business Law Client',
        'quote' => 'Ensaf guided us through complex business legal challenges. Outstanding service!'
    ],
    [
        'image' => '/assets/images/clients/v3_0416757.jpg',
        'name' => 'James Wilson',
        'role' => 'Criminal Law Client',
        'quote' => 'Their expertise in criminal law saved me from a tough situation. Forever grateful!'
    ],
    [
        'image' => '/assets/images/clients/v3_0614267.jpg',
        'name' => 'Emily White',
        'role' => 'Personal Injury Client',
        'quote' => 'Ensaf fought for my rights and ensured I received the compensation I deserved.'
    ],
    [
        'image' => '/assets/images/clients/v3_0824057.jpg',
        'name' => 'David Green',
        'role' => 'Trade Finance Client',
        'quote' => 'Their legal advice on trade finance was invaluable for my business.'
    ]
];
?>

<!-- Testimonials Section -->
<section class="py-20 bg-law-navy relative" style="background-image: url('/assets/images/hero/dotted-background.webp'); background-size: cover; background-position: center;">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-crimson mb-12 text-center" data-aos="fade-up">What Our Clients Say</h2>

        <!-- Embla Carousel -->
        <div class="testimonials-embla" data-aos="fade-up">
            <div class="testimonials-embla__container">
                <?php foreach ($testimonials as $testimonial): ?>
                    <div class="testimonials-embla__slide p-6">
                        <div class="bg-white text-law-navy p-6 rounded-lg shadow-lg">
                            <div class="flex items-center mb-4">
                                <img src="<?php echo $testimonial['image']; ?>" alt="<?php echo $testimonial['name']; ?>" class="w-16 h-16 rounded-full mr-4">
                                <div>
                                    <h3 class="text-lg font-bold"><?php echo $testimonial['name']; ?></h3>
                                    <p class="text-sm text-gray-600"><?php echo $testimonial['role']; ?></p>
                                </div>
                            </div>
                            <p class="text-gray-700 italic">"<?php echo $testimonial['quote']; ?>"</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Include Embla Carousel -->

<style>
.testimonials-embla {
    overflow: hidden;
    position: relative;
}
.testimonials-embla__container {
    display: flex;
    gap: 1rem;
    transition: transform 0.3s ease;
}
.testimonials-embla__slide {
    flex: 0 0 45%;
    max-width: 45%;
    margin: 0 auto;
}
.testimonials-embla__slide img {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    object-fit: cover;
}
.testimonials-embla__slide .bg-white {
    background-color: #071512; /* Theme color */
    color: #ffffff;
    border: 1px solid #1c3d5a; /* Subtle border for theme */
}
.testimonials-embla__slide .bg-white p {
    color: #d1d5db; /* Light gray for text */
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const testimonialsEmblaNode = document.querySelector('.testimonials-embla');
        const testimonialsEmbla = EmblaCarousel(testimonialsEmblaNode, {
            loop: true,
            align: 'center',
            speed: 5,
            slidesToScroll: 2, // Show two testimonials at once
        });
    });
</script>