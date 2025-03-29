<?php
require_once __DIR__ . '/../../backend/utils/functions.php';
$config = getPageConfig();
$homeConfig = $config['pages']['home'];
?>

<!-- Testimonials -->
<section class="py-20 bg-law-navy text-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-crimson mb-12 text-center" data-aos="fade-up">Client Testimonials</h2>
        
        <!-- Swiper container for the carousel -->
        <div class="swiper-container" data-aos="fade-up">
            <div class="swiper-wrapper">
                <?php foreach ($homeConfig['testimonials'] as $index => $testimonial): ?>
                    <div class="swiper-slide">
                        <div class="bg-white/10 p-6 rounded-lg">
                            <div class="flex items-center mb-4">
                                <img class="w-12 h-12 rounded-full mr-4" src="<?= $testimonial['image'] ?? 'https://placehold.co/100x100' ?>" alt="<?= $testimonial['author']; ?>">
                                <div>
                                    <h3 class="font-semibold text-lg"><?= $testimonial['author']; ?></h3>
                                    <p class="text-sm text-law-gold"><?= $testimonial['role'] ?? ''; ?></p>
                                </div>
                            </div>
                            <p class="mb-4 italic">"<?php echo $testimonial['text']; ?>"</p>
                            <?php if (isset($testimonial['rating'])): ?>
                            <div class="flex">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <svg class="w-4 h-4 fill-yellow-500 <?= $i < $testimonial['rating'] ? 'text-yellow-500' : 'text-gray-400' ?>" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 17.77L18.18 21l-1.64-7.03L21 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                                    </svg>
                                <?php endfor; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Swiper controls -->
            <div class="swiper-button-prev text-white"></div>
            <div class="swiper-button-next text-white"></div>
        </div>
    </div>
</section>

<!-- Include Swiper CSS and JS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });
    });
</script>