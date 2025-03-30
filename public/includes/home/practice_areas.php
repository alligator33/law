<?php
// Team and Practice Areas Section
?>

<section id="practice-areas" class="py-20 bg-law-gray">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-crimson mb-12 text-center text-law-navy" data-aos="fade-up">Our Practice Areas</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            $practiceAreas = [
                [
                    'image' => '/assets/images/practices/accident.jpg',
                    'title' => 'Accident Law',
                    'description' => 'We provide expert legal services for accident-related cases.'
                ],
                [
                    'image' => '/assets/images/practices/family.jpg',
                    'title' => 'Family Law',
                    'description' => 'Helping families resolve legal matters with care and expertise.'
                ],
                [
                    'image' => '/assets/images/practices/business.jpg',
                    'title' => 'Business Law',
                    'description' => 'Providing legal solutions for businesses of all sizes.'
                ],
                [
                    'image' => '/assets/images/practices/criminal.jpg',
                    'title' => 'Criminal Law',
                    'description' => 'Expert representation in criminal cases to protect your rights.'
                ],
                [
                    'image' => '/assets/images/practices/personal_injury.jpg',
                    'title' => 'Personal Injury',
                    'description' => 'Compassionate legal support for personal injury claims.'
                ],
                [
                    'image' => '/assets/images/practices/trade_finace.jpg',
                    'title' => 'Trade Finance',
                    'description' => 'Comprehensive legal services for trade and finance matters.'
                ]
            ];

            foreach ($practiceAreas as $area): ?>
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow" data-aos="fade-up">
                    <img src="<?php echo $area['image']; ?>" alt="<?php echo $area['title']; ?>" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold text-law-navy mb-4"><?php echo $area['title']; ?></h3>
                    <p class="text-gray-600"><?php echo $area['description']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>