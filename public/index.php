<?php include '../src/helpers/header.php'; ?>

<!-- Hero Section -->
<section id="home" class="relative h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&q=80');">
    <div class="absolute inset-0 bg-black/60"></div>
    <div class="container mx-auto px-4 z-10 text-center" data-aos="fade-up">
        <h1 class="text-4xl md:text-6xl font-crimson mb-6 text-white">Excellence in Legal Services</h1>
        <p class="text-xl mb-8 max-w-2xl mx-auto text-gray-200">Dedicated to protecting your rights and securing your future with expert legal representation.</p>
        <a href="#contact" class="bg-law-gold hover:bg-law-gold/90 text-white px-8 py-3 rounded transition-colors inline-block">Schedule Consultation</a>
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
                <h2 class="text-3xl font-crimson mb-6 text-law-navy">About Our Firm</h2>
                <p class="mb-6 text-gray-600">With over 20 years of experience, our law firm has been at the forefront of providing exceptional legal services to our clients.</p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="text-center p-4 bg-law-gray rounded-lg">
                        <h3 class="text-2xl font-bold text-law-gold">500+</h3>
                        <p class="text-gray-600">Cases Won</p>
                    </div>
                    <div class="text-center p-4 bg-law-gray rounded-lg">
                        <h3 class="text-2xl font-bold text-law-gold">98%</h3>
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
            <?php
            $practices = [
                ['title' => 'Corporate Law', 'icon' => '⚖️'],
                ['title' => 'Family Law', 'icon' => '👨‍👩‍👧‍👦'],
                ['title' => 'Real Estate', 'icon' => '🏠'],
                ['title' => 'Criminal Defense', 'icon' => '⚔️'],
                ['title' => 'Personal Injury', 'icon' => '🏥'],
                ['title' => 'Intellectual Property', 'icon' => '💡']
            ];
            foreach ($practices as $index => $practice): ?>
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="text-4xl mb-4"><?= $practice['icon'] ?></div>
                    <h3 class="text-xl font-crimson mb-3"><?= $practice['title'] ?></h3>
                    <p class="text-gray-600">Expert legal services in <?= $practice['title'] ?> to protect your interests and achieve your goals.</p>
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
            <?php
            $team = [
                ['name' => 'John Smith', 'role' => 'Senior Partner', 'image' => 'https://placehold.co/400x500'],
                ['name' => 'Sarah Johnson', 'role' => 'Corporate Law Specialist', 'image' => 'https://placehold.co/400x500'],
                ['name' => 'Michael Brown', 'role' => 'Family Law Attorney', 'image' => 'https://placehold.co/400x500']
            ];
            foreach ($team as $index => $member): ?>
                <div class="text-center" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <img src="<?= $member['image'] ?>" alt="<?= $member['name'] ?>" class="w-full h-80 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-crimson mb-2"><?= $member['name'] ?></h3>
                    <p class="text-gray-600"><?= $member['role'] ?></p>
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
            <?php
            $testimonials = [
                ['text' => 'The team provided exceptional service throughout my case. Their expertise and dedication were invaluable.', 'author' => 'Robert Wilson'],
                ['text' => 'I am extremely satisfied with the results. They handled my case professionally and with great attention to detail.', 'author' => 'Emily Parker']
            ];
            foreach ($testimonials as $index => $testimonial): ?>
                <div class="bg-white/10 p-6 rounded-lg" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <p class="mb-4 italic">"<?= $testimonial['text'] ?>"</p>
                    <p class="text-law-gold">- <?= $testimonial['author'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-crimson mb-12 text-center text-law-navy" data-aos="fade-up">Contact Us</h2>
            <form action="contact.php" method="POST" class="space-y-6" data-aos="fade-up">
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

<?php include '../src/helpers/footer.php'; ?>