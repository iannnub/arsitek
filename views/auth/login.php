<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        /* Menambahkan sedikit styling untuk tampilan yang lebih rapi */
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%, hsl(218, 41%, 35%) 15%, hsl(218, 41%, 30%) 35%, hsl(218, 41%, 20%) 75%, hsl(218, 41%, 19%) 80%, transparent 100%), radial-gradient(1250px circle at 100% 100%, hsl(218, 41%, 45%) 15%, hsl(218, 41%, 30%) 35%, hsl(218, 41%, 20%) 75%, hsl(218, 41%, 19%) 80%, transparent 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Pastikan form mengisi seluruh layar */
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

        /* Mengatur margin dan padding */
        .container {
            padding-bottom: 0 !important;
            margin-top: 0 !important;
        }

        .card {
            margin-top: 0 !important; /* Menyesuaikan margin pada card */
        }

        .card-body {
            padding-bottom: 40px; /* Menambahkan padding bawah pada card body */
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
                <a href="/arsitek/public/#home" class="nav-item text-sm font-medium text-primary-400 relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                    Beranda
                </a>
                <a href="/arsitek/public/#about" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                    Tentang Kami
                </a>
                <a href="/arsitek/public/#services" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                    Layanan
                </a>
                <a href="/arsitek/public/#portfolio" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                    Portfolio
                </a>
                <a href="/arsitek/public/#testimonials" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                    Testimonial
                </a>
                <a href="/arsitek/public/#faq" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                    FAQ
                </a>
                <a href="/arsitek/public/#contact" class="nav-item text-sm font-medium text-dark-300 hover:text-primary-400 transition-colors relative py-2 group active:text-primary-400 aria-current:text-primary-400">
                    Kontak
                </a>
            </nav>

            <!-- Auth Links -->
            <?php
// Ensure session is started only once
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="hidden md:flex items-center space-x-4">
    <?php if (empty($_SESSION['user'])): ?>
        <a href="<?= url('auth/login') ?>" class="text-sm font-medium text-white hover:text-primary-400 transition-colors">Login</a>
        <a href="<?= url('auth/register') ?>" class="text-sm font-medium text-primary-500 hover:text-primary-300 transition-colors">Daftar</a>
    <?php else: ?>
        <span class="text-sm text-gray-300">Halo, <?= htmlspecialchars($_SESSION['user']['name'] ?? '', ENT_QUOTES, 'UTF-8') ?></span>
        <a href="<?= url('logout') ?>" class="text-sm font-medium text-red-400 hover:text-red-300 transition-colors">Logout</a>
    <?php endif; ?>
</div>
        </div>
    </div>
</header>

<!-- Section: Design Block -->
<section id="login-architect" class="architect-login-section position-relative overflow-hidden" style="background:#000; min-height:100vh; padding-top:90px;">
  <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height:80vh;">
    <!-- Floating Blueprint Lines and Animated Shapes -->
    <svg class="blueprint-lines position-absolute top-0 start-0 w-100 h-100" style="pointer-events:none;z-index:1;" width="100%" height="100%" viewBox="0 0 1920 1080" fill="none">
      <g stroke="#00FFEA" stroke-width="1.5" opacity="0.18">
        <rect x="200" y="120" width="600" height="340" rx="32"/>
        <rect x="1200" y="400" width="500" height="260" rx="32"/>
        <line x1="100" y1="800" x2="800" y2="800"/>
        <line x1="1400" y1="200" x2="1800" y2="600"/>
        <circle cx="1650" cy="200" r="40"/>
      </g>
      <g stroke="#A259FF" stroke-width="2" opacity="0.12">
        <rect x="400" y="700" width="180" height="100" rx="20"/>
        <polygon points="1700,900 1750,950 1800,900 1750,850"/>
        <line x1="300" y1="200" x2="500" y2="400"/>
      </g>
    </svg>
    <!-- Animated Construction Icon (Crane) -->
    <div class="animated-crane position-absolute" style="top:30px; left:50%; transform:translateX(-50%); z-index:2;">
      <svg width="120" height="60" viewBox="0 0 120 60" fill="none">
        <rect x="10" y="40" width="100" height="8" rx="4" fill="#FF4C60"/>
        <rect x="55" y="10" width="10" height="30" rx="5" fill="#00FFEA">
          <animate attributeName="y" values="10;20;10" dur="2s" repeatCount="indefinite"/>
        </rect>
        <rect x="60" y="5" width="2" height="10" rx="1" fill="#A259FF"/>
        <circle cx="61" cy="45" r="6" fill="#fff"/>
      </svg>
    </div>
    <!-- Login Card -->
    <div class="architect-login-card card p-5 shadow-lg" style="max-width:380px; width:100%; background:rgba(20,20,20,0.98); border-radius:32px; z-index:3; box-shadow:0 8px 32px 0 rgba(0,255,234,0.12);">
      <div class="text-center mb-4">
        <i class="fas fa-drafting-compass" style="font-size:2.5rem; color:#00FFEA;"></i>
        <h2 class="fw-bold mt-3 mb-1" style="color:#fff; font-family:'Inter',sans-serif; letter-spacing:-1px;">Login</h2>
      </div>
      <form method="POST" action="<?= url('auth/submit') ?>" autocomplete="on" style="z-index:4;">
        <input type="hidden" name="action" value="login">
        <!-- Email -->
        <div class="mb-3">
          <label for="login-email" class="form-label visually-hidden">Email address</label>
          <div class="input-icon-group position-relative">
            <input type="email" name="email" id="login-email" class="form-control architect-input" placeholder="Email address" required autocomplete="username" aria-label="Email address" style="background:#18181b; color:#fff; border-radius:18px; border:2px solid #222; font-size:1.08rem; box-shadow:0 2px 8px 0 rgba(0,255,234,0.06); padding-left:2.5rem;">
            <span class="position-absolute" style="top:50%; left:12px; transform:translateY(-50%); color:#00FFEA; font-size:1.15rem;"><i class="fas fa-envelope"></i></span>
          </div>
        </div>
        <!-- Password -->
        <div class="mb-3">
          <label for="login-password" class="form-label visually-hidden">Password</label>
          <div class="input-icon-group position-relative">
            <input type="password" name="password" id="login-password" class="form-control architect-input" placeholder="Password" required autocomplete="current-password" aria-label="Password" style="background:#18181b; color:#fff; border-radius:18px; border:2px solid #222; font-size:1.08rem; box-shadow:0 2px 8px 0 rgba(162,89,255,0.08); padding-left:2.5rem;">
            <span class="position-absolute" style="top:50%; left:12px; transform:translateY(-50%); color:#A259FF; font-size:1.15rem;"><i class="fas fa-lock"></i></span>
          </div>
        </div>
        <!-- Remember Me & Forgot Password -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="form-check">
            <input class="form-check-input architect-checkbox" type="checkbox" value="1" id="architect-remember" style="border-radius:6px; border:2px solid #00FFEA; background:#000;">
            <label class="form-check-label" for="architect-remember" style="color:#fff; font-size:0.98rem;">Remember me</label>
          </div>
          <a href="<?= url('auth/forgot-password') ?>" class="architect-link-forgot" style="color:#00FFEA; font-weight:600; text-decoration:none; transition:color 0.2s;">Forgot password?</a>
        </div>
        <!-- Login Button -->
        <div class="mb-3">
          <button type="submit" class="architect-login-btn btn w-100 py-3 fw-bold" style="background:#FF4C60; color:#fff; border-radius:18px; font-size:1.15rem; box-shadow:0 4px 16px 0 rgba(255,76,96,0.18); letter-spacing:0.5px; transition:transform 0.16s, box-shadow 0.18s;">
            <span class="architect-login-btn-text">Login</span>
            <i class="fas fa-arrow-right ms-2"></i>
          </button>
        </div>
        <div class="text-center">
          <span style="color:#fff; font-size:0.97rem;">Don't have an account?</span>
          <a href="<?= url('auth/register') ?>" class="architect-link-register ms-1" style="color:#A259FF; font-weight:700; text-decoration:none; transition:color 0.2s;">Register</a>
        </div>
      </form>
    </div>
    <!-- Floating Construction Tool Icon -->
    <div class="floating-tool-icon position-absolute" style="bottom:40px; right:7vw; z-index:2; animation:floating-tool 3s ease-in-out infinite alternate;">
      <svg width="58" height="58" viewBox="0 0 58 58" fill="none">
        <rect x="10" y="40" width="38" height="8" rx="4" fill="#00FFEA"/>
        <rect x="27" y="15" width="4" height="25" rx="2" fill="#A259FF"/>
        <circle cx="29" cy="45" r="7" fill="#FF4C60"/>
      </svg>
    </div>
  </div>
</section>
<style>
  .architect-login-section { font-family: 'Inter', 'Segoe UI', sans-serif; }
  .architect-login-card { border: none; }
  .architect-login-btn:hover, .architect-login-btn:focus {
    background: #00FFEA !important;
    color: #000 !important;
    transform: translateY(-2px) scale(1.025);
    box-shadow: 0 6px 24px 0 rgba(0,255,234,0.24);
  }
  .architect-login-btn:active { transform: scale(0.98); }
  .architect-input:focus {
    border-color: #00FFEA;
    box-shadow: 0 0 0 2px #00FFEA44;
    background: #18181b;
    color: #fff;
  }
  .architect-link-forgot:hover, .architect-link-forgot:focus {
    color: #FF4C60 !important;
    text-decoration: underline;
  }
  .architect-link-register:hover, .architect-link-register:focus {
    color: #00FFEA !important;
    text-decoration: underline;
  }
  .architect-checkbox:focus {
    border-color: #A259FF;
    box-shadow: 0 0 0 2px #A259FF44;
  }
  .input-icon-group input {
    padding-left: 2.5rem !important;
  }
  @media (max-width: 600px) {
    .architect-login-card { padding: 2rem 1rem !important; }
    .animated-crane { display: none !important; }
    .floating-tool-icon { display: none !important; }
    .blueprint-lines { display: none !important; }
  }
  @keyframes floating-tool {
    0% { transform: translateY(0); }
    100% { transform: translateY(-18px); }
  }
</style>

<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
