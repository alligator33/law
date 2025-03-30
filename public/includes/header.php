<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Law Firm - Excellence in Legal Services</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/embla-carousel/embla-carousel.min.css">
    <script src="https://cdn.jsdelivr.net/npm/embla-carousel/embla-carousel.umd.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <style>
        /* Responsive header menu */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
        }

        .navbar-menu {
            display: none;
            flex-direction: column;
            gap: 1rem;
            background-color: #fff;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }

        .navbar-menu.active {
            display: flex;
        }

        .navbar-toggle {
            display: none;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .navbar-toggle {
                display: block;
            }

            .navbar-links {
                display: none;
            }
        }
    </style>
</head>

<body class="font-inter">
    <!-- Navbar -->
    <nav class="fixed w-full bg-white/95 backdrop-blur-sm shadow-sm z-50">
        <div class="container mx-auto px-4">
            <div class="navbar">
                <a href="/" class="text-2xl font-crimson font-bold text-law-navy">Law Firm</a>
                <div class="navbar-links hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-law-gold transition-colors">Home</a>
                    <a href="/#about" class="text-gray-700 hover:text-law-gold transition-colors">About</a>
                    <a href="/practice-page.php" class="text-gray-700 hover:text-law-gold transition-colors">Practice
                        Areas</a>
                    <a href="/#team" class="text-gray-700 hover:text-law-gold transition-colors">Our Team</a>
                    <a href="/#contact" class="text-gray-700 hover:text-law-gold transition-colors">Contact</a>
                </div>
                <div class="navbar-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div class="navbar-menu">
                <a href="/" class="block py-2 text-gray-700 hover:text-law-gold">Home</a>
                <a href="/#about" class="block py-2 text-gray-700 hover:text-law-gold">About</a>
                <a href="/practice-page.php" class="block py-2 text-gray-700 hover:text-law-gold">Practice Areas</a>
                <a href="/#team" class="block py-2 text-gray-700 hover:text-law-gold">Our Team</a>
                <a href="/#contact" class="block py-2 text-gray-700 hover:text-law-gold">Contact</a>
            </div>
        </div>
    </nav>
    <script>
        // Toggle mobile menu
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButton = document.querySelector('.navbar-toggle');
            const menu = document.querySelector('.navbar-menu');

            toggleButton.addEventListener('click', function () {
                menu.classList.toggle('active');
            });
        });
    </script>
</body>

</html>