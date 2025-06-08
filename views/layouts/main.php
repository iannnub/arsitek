<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' . SITE_NAME : SITE_NAME ?></title>
    <meta name="description" content="<?= isset($description) ? $description : SITE_DESCRIPTION ?>">
    <meta name="keywords" content="<?= META_KEYWORDS ?>">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="text/javascript" id="tailwind-config">
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                            950: '#082f49',
                        },
                        secondary: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#020617',
                        },
                        dark: {
                            50: '#fafafa',
                            100: '#f4f4f5',
                            200: '#e4e4e7',
                            300: '#d4d4d8',
                            400: '#a1a1aa',
                            500: '#71717a',
                            600: '#52525b',
                            700: '#3f3f46',
                            800: '#27272a',
                            900: '#18181b',
                            950: '#09090b',
                        },
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    textShadow: {
                        DEFAULT: '0 2px 10px rgba(0, 0, 0, 0.8)',
                        sm: '0 1px 2px rgba(0, 0, 0, 0.7)',
                        md: '0 3px 6px rgba(0, 0, 0, 0.7)',
                        lg: '0 5px 15px rgba(0, 0, 0, 0.7)',
                    },
                    animation: {
                        'fadeIn': 'fadeIn 0.5s ease-out forwards',
                        'fadeOut': 'fadeOut 0.5s ease-out forwards',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        fadeOut: {
                            '0%': { opacity: '1' },
                            '100%': { opacity: '0' },
                        }
                    }
                }
            },
            plugins: [
                function({ addUtilities, theme, e }) {
                    const textShadowUtilities = Object.entries(theme('textShadow', {})).map(([key, value]) => {
                        return {
                            [`.${e(key === 'DEFAULT' ? 'text-shadow' : `text-shadow-${key}`)}`]: {
                                textShadow: value,
                            },
                        }
                    });
                    addUtilities(textShadowUtilities, ['responsive', 'hover']);
                }
            ]
        }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    
</head>
    <body class="font-sans text-white bg-black">
    <!-- Header/Navbar -->
    <header class="fixed w-full bg-black shadow-lg z-50 transition-all duration-300 ease-in-out">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3">
                <!-- Logo -->
                <a href="<?= url('/') ?>" class="block group">
                    <img src="assets/images/4.webp" alt="Antosa Architect Logo" class="h-10 transition-transform duration-300 group-hover:scale-105">
                    <div class="h-[3px] bg-primary-400 mt-[2px] w-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform scale-x-0 group-hover:scale-x-100 origin-left"></div>
                </a>
                
                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-5 lg:space-x-7 mx-auto">
                    <a href="#home" class="nav-item text-sm font-medium text-primary-400 relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                        Beranda
                        <span class="absolute bottom-0 left-0 w-full h-[2px] bg-primary-400 transform scale-x-100 transition-transform duration-300 ease-out group-active:bg-primary-400 group-[aria-current]:bg-primary-400"></span>
                    </a>
                    <a href="#about" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                        Tentang Kami
                        <span class="absolute bottom-0 left-0 w-full h-[2px] bg-primary-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out origin-center group-active:bg-primary-400 group-[aria-current]:bg-primary-400"></span>
                    </a>
                    <a href="#services" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                        Layanan
                        <span class="absolute bottom-0 left-0 w-full h-[2px] bg-primary-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out origin-center group-active:bg-primary-400 group-[aria-current]:bg-primary-400"></span>
                    </a>
                    <a href="#portfolio" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                        Portfolio
                        <span class="absolute bottom-0 left-0 w-full h-[2px] bg-primary-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out origin-center group-active:bg-primary-400 group-[aria-current]:bg-primary-400"></span>
                    </a>
                    <a href="#testimonials" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                        Testimonial
                        <span class="absolute bottom-0 left-0 w-full h-[2px] bg-primary-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out origin-center group-active:bg-primary-400 group-[aria-current]:bg-primary-400"></span>
                    </a>
                    <a href="#faq" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                        FAQ
                        <span class="absolute bottom-0 left-0 w-full h-[2px] bg-primary-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out origin-center group-active:bg-primary-400 group-[aria-current]:bg-primary-400"></span>
                    </a>
                    <a href="#contact" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                        Kontak
                        <span class="absolute bottom-0 left-0 w-full h-[2px] bg-primary-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out origin-center group-active:bg-primary-400 group-[aria-current]:bg-primary-400"></span>
                    </a>
                </nav>

                <!-- Auth Links -->
<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

<!-- Auth Links (Desktop) -->
<div class="hidden md:flex items-center space-x-4">
    <?php if (empty($_SESSION['user'])): ?>
        <a href="<?= url('auth/login') ?>" class="text-sm font-medium text-white hover:text-primary-400 transition-colors">Login</a>
        <a href="<?= url('auth/register') ?>" class="text-sm font-medium text-primary-500 hover:text-primary-300 transition-colors">Daftar</a>
    <?php else: ?>
        <span class="text-sm text-gray-300">Halo, <?= $_SESSION['user']['name'] ?></span>
        <a href="<?= url('logout') ?>" class="text-sm font-medium text-red-400 hover:text-red-300 transition-colors">Logout</a>
    <?php endif; ?>
</div>


                
<!-- Mobile Navigation -->
<div id="mobile-menu" class="md:hidden hidden bg-black">
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <a href="#home" class="mobile-nav-item block px-3 py-2 rounded-md text-base font-medium text-emerald-400 hover:bg-emerald-900">Beranda</a>
        <a href="#about" class="mobile-nav-item block px-3 py-2 rounded-md text-base font-medium text-white hover:text-emerald-400 hover:bg-emerald-900">Tentang Kami</a>
        <a href="#services" class="mobile-nav-item block px-3 py-2 rounded-md text-base font-medium text-white hover:text-emerald-400 hover:bg-emerald-900">Layanan</a>
        <a href="#portfolio" class="mobile-nav-item block px-3 py-2 rounded-md text-base font-medium text-dark-300 hover:text-emerald-400 hover:bg-dark-800">Portfolio</a>
        <a href="#testimonials" class="mobile-nav-item block px-3 py-2 rounded-md text-base font-medium text-dark-300 hover:text-emerald-400 hover:bg-dark-800">Testimonial</a>
        <a href="#faq" class="mobile-nav-item block px-3 py-2 rounded-md text-base font-medium text-dark-300 hover:text-emerald-400 hover:bg-dark-800">FAQ</a>
        <a href="#contact" class="mobile-nav-item block px-3 py-2 rounded-md text-base font-medium text-dark-300 hover:text-emerald-400 hover:bg-dark-800">Kontak</a>
    </div>

    <!-- Mobile Auth -->
    <div class="pt-4 pb-3 border-t border-dark-700">
        <div class="px-2 space-y-1">
            <?php if (empty($_SESSION['user'])): ?>
                <a href="<?= url('auth/login') ?>" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:text-primary-400 hover:bg-dark-800">
                    <i class="fa-solid fa-right-to-bracket mr-2"></i> Login
                </a>
                <a href="<?= url('auth/register') ?>" class="block px-3 py-2 rounded-md text-base font-medium text-primary-500 hover:text-primary-300 hover:bg-dark-800">
                    <i class="fa-solid fa-user-plus mr-2"></i> Daftar
                </a>
            <?php else: ?>
                <div class="px-3 py-2 text-sm text-gray-300">Halo, <?= $_SESSION['user']['name'] ?></div>
                <a href="<?= url('logout') ?>" class="block px-3 py-2 rounded-md text-base font-medium text-red-400 hover:text-red-300 hover:bg-dark-800">
                    <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>


            
            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="md:hidden hidden bg-black">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="#home" class="mobile-nav-item block px-3 py-2 rounded-md text-base font-medium text-emerald-400 hover:bg-emerald-900">Beranda</a>
                    <a href="#about" class="mobile-nav-item block px-3 py-2 rounded-md text-base font-medium text-white hover:text-emerald-400 hover:bg-emerald-900">Tentang Kami</a>
                    <a href="#services" class="mobile-nav-item block px-3 py-2 rounded-md text-base font-medium text-white hover:text-emerald-400 hover:bg-emerald-900">Layanan</a>
                    <a href="#portfolio" class="mobile-nav-item block px-3 py-2 rounded-md text-base font-medium text-dark-300 hover:text-emerald-400 hover:bg-dark-800">Portfolio</a>
                    <a href="#testimonials" class="mobile-nav-item block px-3 py-2 rounded-md text-base font-medium text-dark-300 hover:text-emerald-400 hover:bg-dark-800">Testimonial</a>
                    <a href="#faq" class="mobile-nav-item block px-3 py-2 rounded-md text-base font-medium text-dark-300 hover:text-emerald-400 hover:bg-dark-800">FAQ</a>
                    <a href="#contact" class="mobile-nav-item block px-3 py-2 rounded-md text-base font-medium text-dark-300 hover:text-emerald-400 hover:bg-dark-800">Kontak</a>
                </div>
                <div class="pt-4 pb-3 border-t border-dark-700">
                    <div class="px-2 space-y-1">
                        <a href="#" title="Masuk/Daftar" class="block px-3 py-2 rounded-md text-base font-medium text-dark-300 hover:text-emerald-400 hover:bg-dark-800 flex items-center">
                            <i class="fa-solid fa-right-to-bracket mr-2"></i> Masuk / Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <?= $content ?? '' ?>
    </main>

    <!-- JavaScript -->
    <script src="/assets/js/main.js" defer></script>
    <script src="/assets/js/content-toggle.js" defer></script>
    <script src="/assets/js/hero-slider.js" defer></script>
    <script src="/assets/js/home-portfolio.js" defer></script>
    <script src="/assets/js/faq.js" defer></script>

    <?php require_once 'partials/footer.php'; ?>
</body>
</html>
