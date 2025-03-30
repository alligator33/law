<?php
require_once __DIR__ . '/../../backend/utils/functions.php';
$config = getPageConfig();
$homeConfig = $config['pages']['home'];
?>

<!-- Testimonials Section -->
<section class="py-20 bg-law-navy text-white relative" style="background-image: url('/assets/images/hero/dotted-background.webp'); background-size: cover; background-position: center;">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-crimson mb-12 text-center" data-aos="fade-up">What Our Clients Say</h2>

        <!-- Embla Carousel -->
        <div class="testimonials-embla" data-aos="fade-up">
            <div class="testimonials-embla__container">
                <?php foreach ($homeConfig['testimonials'] as $index => $testimonial): ?>
                    <div class="testimonials-embla__slide p-6">
                        <div class="bg-white text-law-navy p-6 rounded-lg shadow-lg">
                            <div class="flex items-center mb-4">
                                <img src="<?php echo isset($testimonial['image']) ? $testimonial['image'] : '/assets/images/default-avatar.png'; ?>" alt="<?php echo isset($testimonial['name']) ? $testimonial['name'] : 'Anonymous'; ?>" class="w-16 h-16 rounded-full mr-4">
                                <div>
                                    <h3 class="text-lg font-bold"><?php echo isset($testimonial['name']) ? $testimonial['name'] : 'Anonymous'; ?></h3>
                                    <p class="text-sm text-gray-600"><?php echo isset($testimonial['role']) ? $testimonial['role'] : 'Client'; ?></p>
                                </div>
                            </div>
                            <p class="text-gray-700 italic">"<?php echo isset($testimonial['quote']) ? $testimonial['quote'] : 'No testimonial provided.'; ?>"</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Include Embla Carousel -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/embla-carousel/embla-carousel.min.css">
<script src="https://cdn.jsdelivr.net/npm/embla-carousel/embla-carousel.umd.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const testimonialsEmblaNode = document.querySelector('.testimonials-embla');
        const testimonialsEmbla = EmblaCarousel(testimonialsEmblaNode, {
            loop: true,
            align: 'center',
            speed: 5,
        });
    });
</script>

<style>
.testimonials-embla {
    overflow: hidden;
    position: relative;
}
.testimonials-embla__container {
    display: flex;
    gap: 1rem;
}
.testimonials-embla__slide {
    flex: 0 0 100%;
    max-width: 400px;
    margin: 0 auto;
}
</style>