<?php
// Team and Practice Areas Section
?>
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

<section id="practice-areas" class="py-20 bg-law-gray">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-crimson mb-12 text-center text-law-navy" data-aos="fade-up">Our Practice Areas</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow" data-aos="fade-up">
                <img src="/assets/images/practices/accident.jpg" alt="Accident Law" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-bold text-law-navy mb-4">Accident Law</h3>
                <p class="text-gray-600">We provide expert legal services for accident-related cases.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow" data-aos="fade-up">
                <img src="/assets/images/practices/family.jpg" alt="Family Law" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-bold text-law-navy mb-4">Family Law</h3>
                <p class="text-gray-600">Helping families resolve legal matters with care and expertise.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow" data-aos="fade-up">
                <img src="/assets/images/practices/business.jpg" alt="Business Law" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-bold text-law-navy mb-4">Business Law</h3>
                <p class="text-gray-600">Providing legal solutions for businesses of all sizes.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow" data-aos="fade-up">
                <img src="/assets/images/practices/criminal.jpg" alt="Criminal Law" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-bold text-law-navy mb-4">Criminal Law</h3>
                <p class="text-gray-600">Expert representation in criminal cases to protect your rights.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow" data-aos="fade-up">
                <img src="/assets/images/practices/personal_injury.jpg" alt="Personal Injury" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-bold text-law-navy mb-4">Personal Injury</h3>
                <p class="text-gray-600">Compassionate legal support for personal injury claims.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow" data-aos="fade-up">
                <img src="/assets/images/practices/trade_finace.jpg" alt="Trade Finance" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-bold text-law-navy mb-4">Trade Finance</h3>
                <p class="text-gray-600">Comprehensive legal services for trade and finance matters.</p>
            </div>
        </div>
    </div>
</section>