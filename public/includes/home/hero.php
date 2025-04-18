<?php
// Hero Section with Embla Carousel slideshow
?>
<section id="home" class="relative h-screen">
    <div class="hero-embla h-full overflow-hidden">
        <div class="hero-embla__container h-full flex">
            <!-- Slide 1 -->
            <div class="hero-embla__slide flex-shrink-0 relative h-full w-full bg-cover bg-center" style="background-image: url('/assets/images/hero/hero1.jpg');">
                <div class="absolute inset-0 bg-black/60"></div>
                <div class="container mx-auto px-4 z-10 text-center flex items-center justify-center h-full" data-aos="fade-up">
                    <div>
                        <h1 class="text-4xl md:text-6xl font-crimson mb-6 text-white">Welcome to Our Firm</h1>
                        <p class="text-xl mb-8 max-w-2xl mx-auto text-gray-200">Your trusted legal partner</p>
                        <a href="#contact" class="bg-law-gold hover:bg-law-gold/90 text-white px-8 py-3 rounded transition-colors inline-block">Contact Us</a>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="hero-embla__slide flex-shrink-0 relative h-full w-full bg-cover bg-center" style="background-image: url('/assets/images/hero/hero2.jpg');">
                <div class="absolute inset-0 bg-black/60"></div>
                <div class="container mx-auto px-4 z-10 text-center flex items-center justify-center h-full" data-aos="fade-up">
                    <div>
                        <h1 class="text-4xl md:text-6xl font-crimson mb-6 text-white">Expert Legal Services</h1>
                        <p class="text-xl mb-8 max-w-2xl mx-auto text-gray-200">We fight for your rights</p>
                        <a href="#contact" class="bg-law-gold hover:bg-law-gold/90 text-white px-8 py-3 rounded transition-colors inline-block">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Embla Carousel -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const heroEmblaNode = document.querySelector('.hero-embla');
        const heroEmbla = EmblaCarousel(heroEmblaNode, {
            loop: true,
            align: 'start',
            speed: 5,
        });
    });
</script>

<style>
.hero-embla {
    position: relative;
    height: 100%;
}
.hero-embla__container {
    display: flex;
    height: 100%;
    transition: transform 0.3s ease;
}
.hero-embla__slide {
    position: relative;
    flex: 0 0 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
}
.hero-embla__slide .container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100%;
    text-align: center;
    padding: 1rem;
}
</style>