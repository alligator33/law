<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Law Firm - Excellence in Legal Services</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</head>
<body class="font-inter">
    <!-- Navbar -->
    <nav class="fixed w-full bg-white/95 backdrop-blur-sm shadow-sm z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <a href="/" class="text-2xl font-crimson font-bold text-law-navy">Law Firm</a>
                <div class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-law-gold transition-colors">Home</a>
                    <a href="/#about" class="text-gray-700 hover:text-law-gold transition-colors">About</a>
                    <a href="/practice-areas.php" class="text-gray-700 hover:text-law-gold transition-colors">Practice Areas</a>
                    <a href="/#team" class="text-gray-700 hover:text-law-gold transition-colors">Our Team</a>
                    <a href="/#contact" class="text-gray-700 hover:text-law-gold transition-colors">Contact</a>
                </div>
                <button class="md:hidden" onclick="toggleMobileMenu()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden md:hidden pb-4">
                <a href="/" class="block py-2 text-gray-700 hover:text-law-gold">Home</a>
                <a href="/#about" class="block py-2 text-gray-700 hover:text-law-gold">About</a>
                <a href="/practice-areas.php" class="block py-2 text-gray-700 hover:text-law-gold">Practice Areas</a>
                <a href="/#team" class="block py-2 text-gray-700 hover:text-law-gold">Our Team</a>
                <a href="/#contact" class="block py-2 text-gray-700 hover:text-law-gold">Contact</a>
            </div>
        </div>
    </nav>
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>