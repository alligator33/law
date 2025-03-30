<?php 
require_once __DIR__ . '/../backend/utils/functions.php';
include 'includes/header.php';
$config = getPageConfig();
?>

<main class="pt-20">
    <!-- Practice Areas Hero -->
    <section class="bg-law-navy text-white py-20">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-crimson text-center mb-8">Our Practice Areas</h1>
            <p class="text-xl text-center text-gray-300 max-w-3xl mx-auto">Comprehensive legal expertise across multiple disciplines to serve your needs</p>
            
            <!-- Quick Navigation -->
            <div class="mt-12 flex flex-wrap justify-center gap-4">
                <a href="#corporate-law" class="bg-white/10 hover:bg-law-gold transition-colors px-6 py-3 rounded-lg">Corporate Law</a>
                <a href="#civil-litigation" class="bg-white/10 hover:bg-law-gold transition-colors px-6 py-3 rounded-lg">Civil Litigation</a>
                <a href="#real-estate" class="bg-white/10 hover:bg-law-gold transition-colors px-6 py-3 rounded-lg">Real Estate Law</a>
                <a href="#family-law" class="bg-white/10 hover:bg-law-gold transition-colors px-6 py-3 rounded-lg">Family Law</a>
                <a href="#intellectual-property" class="bg-white/10 hover:bg-law-gold transition-colors px-6 py-3 rounded-lg">Intellectual Property</a>
            </div>
            </div>
        </div>
    </section>

    <!-- Individual Practice Areas -->
    <section id="corporate-law" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-crimson text-law-navy mb-8">Corporate Law</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <img src="https://placehold.co/600x400" alt="Corporate Law" class="rounded-lg shadow-lg mb-6">
                    </div>
                    <div>
                        <p class="text-gray-600 mb-6">Our corporate law practice provides comprehensive legal solutions for businesses of all sizes. We specialize in:</p>
                        <ul class="space-y-4 text-gray-600">
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Business Formation and Structure
                            </li>
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Mergers and Acquisitions
                            </li>
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Corporate Governance
                            </li>
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Contract Negotiations
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="civil-litigation" class="py-20 bg-law-gray">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-crimson text-law-navy mb-8">Civil Litigation</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="order-2 md:order-1">
                        <p class="text-gray-600 mb-6">Our experienced litigation team handles complex civil disputes with strategic precision. Our expertise includes:</p>
                        <ul class="space-y-4 text-gray-600">
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Commercial Disputes
                            </li>
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Contract Disputes
                            </li>
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Employment Litigation
                            </li>
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Alternative Dispute Resolution
                            </li>
                        </ul>
                    </div>
                    <div class="order-1 md:order-2">
                        <img src="https://placehold.co/600x400" alt="Civil Litigation" class="rounded-lg shadow-lg mb-6">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="real-estate" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-crimson text-law-navy mb-8">Real Estate Law</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <img src="https://placehold.co/600x400" alt="Real Estate Law" class="rounded-lg shadow-lg mb-6">
                    </div>
                    <div>
                        <p class="text-gray-600 mb-6">Our real estate practice covers all aspects of property law and transactions. We handle:</p>
                        <ul class="space-y-4 text-gray-600">
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Commercial Property Transactions
                            </li>
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Residential Real Estate
                            </li>
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Property Development
                            </li>
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Lease Agreements
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="family-law" class="py-20 bg-law-gray">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-crimson text-law-navy mb-8">Family Law</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="order-2 md:order-1">
                        <p class="text-gray-600 mb-6">We provide compassionate and professional family law services. Our areas include:</p>
                        <ul class="space-y-4 text-gray-600">
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Divorce and Separation
                            </li>
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Child Custody and Support
                            </li>
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Property Division
                            </li>
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Prenuptial Agreements
                            </li>
                        </ul>
                    </div>
                    <div class="order-1 md:order-2">
                        <img src="https://placehold.co/600x400" alt="Family Law" class="rounded-lg shadow-lg mb-6">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="intellectual-property" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-crimson text-law-navy mb-8">Intellectual Property</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <img src="https://placehold.co/600x400" alt="Intellectual Property" class="rounded-lg shadow-lg mb-6">
                    </div>
                    <div>
                        <p class="text-gray-600 mb-6">We protect your intellectual property rights with comprehensive legal solutions:</p>
                        <ul class="space-y-4 text-gray-600">
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Patent Applications
                            </li>
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Trademark Registration
                            </li>
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                Copyright Protection
                            </li>
                            <li class="flex items-start">
                                <span class="text-law-gold mr-2">•</span>
                                IP Litigation
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

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