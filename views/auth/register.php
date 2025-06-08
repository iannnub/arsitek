<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <!-- Link CSS Bootstrap dan Font Awesome (untuk ikon sosial media) -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
                }
            }
        }
    </script>
    <style>
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%, hsl(218, 41%, 35%) 15%, hsl(218, 41%, 30%) 35%, hsl(218, 41%, 20%) 75%, hsl(218, 41%, 19%) 80%, transparent 100%), radial-gradient(1250px circle at 100% 100%, hsl(218, 41%, 45%) 15%, hsl(218, 41%, 30%) 35%, hsl(218, 41%, 20%) 75%, hsl(218, 41%, 19%) 80%, transparent 100%);
        }

        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }
    </style>
</head>

<body class="bg-light">
<!-- Navbar -->
<header class="fixed w-full bg-black shadow-lg z-50 transition-all duration-300 ease-in-out">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-3">
            <!-- Logo -->
            <a href="<?= url('/') ?>" class="block group">
                <img src="../assets/images/4.webp" alt="Antosa Architect Logo" class="h-10 transition-transform duration-300 group-hover:scale-105">
                <div class="h-[3px] bg-primary-400 mt-[2px] w-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform scale-x-0 group-hover:scale-x-100 origin-left"></div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-5 lg:space-x-7 mx-auto">
                <a href="#home" class="nav-item text-sm font-medium text-primary-400 relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                    Beranda
                </a>
                <a href="#about" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                    Tentang Kami
                </a>
                <a href="#services" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                    Layanan
                </a>
                <a href="#portfolio" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                    Portfolio
                </a>
                <a href="#testimonials" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                    Testimonial
                </a>
                <a href="#faq" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                    FAQ
                </a>
                <a href="#contact" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                    Kontak
                </a>
            </nav>

            <!-- Auth Links -->
            <?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
            <div class="hidden md:flex items-center space-x-4">
                <?php if (empty($_SESSION['user'])): ?>
                    <a href="<?= url('auth/login') ?>" class="text-sm font-medium text-white hover:text-primary-400 transition-colors">Login</a>
                    <a href="<?= url('auth/register') ?>" class="text-sm font-medium text-primary-500 hover:text-primary-300 transition-colors">Daftar</a>
                <?php else: ?>
                    <span class="text-sm text-gray-300">Halo, <?= $_SESSION['user']['name'] ?></span>
                    <a href="<?= url('logout') ?>" class="text-sm font-medium text-red-400 hover:text-red-300 transition-colors">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<!-- Section: Registrasi Form -->
<section class="background-radial-gradient overflow-hidden">
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Create Your Account <br />
          <span style="color: hsl(218, 81%, 75%)">Sign up to get started</span>
        </h1>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form method="POST" action="<?= url('auth/submit') ?>">
              <input type="hidden" name="action" value="register">
              
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" name="first_name" id="form3Example1" class="form-control" required>
                    <label class="form-label" for="form3Example1">First Name</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" name="last_name" id="form3Example2" class="form-control" required>
                    <label class="form-label" for="form3Example2">Last Name</label>
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" name="email" id="form3Example3" class="form-control" required>
                <label class="form-label" for="form3Example3">Email Address</label>
              </div>

              <!-- Password input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" name="password" id="form3Example4" class="form-control" required>
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              <!-- Confirm Password input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" name="confirm_password" id="form3Example5" class="form-control" required>
                <label class="form-label" for="form3Example5">Confirm Password</label>
              </div>

              <!-- Submit button -->
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign Up</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>or sign up with:</p>
                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>

                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>

                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-github"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
