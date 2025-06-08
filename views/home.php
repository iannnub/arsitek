<?php
/**
 * Home/Landing Page View
 */

// Set meta data for the page
$description = SITE_DESCRIPTION;

// Start output buffering for the content
ob_start();
?>

<?php
$hero_slides = [
    ['image' => 'assets/images/1.webp'],
    ['image' => 'assets/images/2.webp'],
];
?>
    

<!-- Hero Section -->
<section id="home" class="relative min-h-screen flex flex-col text-white overflow-hidden scroll-mt-20 bg-black">
    <!-- Slider Container -->
    <div id="hero-slider" class="absolute inset-0 w-full h-full">
        <?php foreach ($hero_slides as $index => $slide): ?>
        <div class="hero-slide absolute inset-0 w-full h-full bg-cover bg-center transition-opacity duration-1000 ease-in-out <?= $index === 0 ? 'opacity-100' : 'opacity-0' ?>"
             style="background-image: url('<?= htmlspecialchars($slide['image']) ?>');"
             aria-hidden="<?= $index !== 0 ? 'true' : 'false' ?>" role="group" aria-roledescription="slide">
            <div class="absolute inset-0 bg-black/60"></div> <!-- Overlay for text readability -->
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Content Overlay -->
    <div class="relative z-10 flex flex-col flex-grow">
        <!-- Top Bar Elements -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 pt-8 md:pt-12 flex justify-between items-start">
            <!-- Spatial Vision Box -->
            <div class="bg-black/70 p-4 md:p-6 rounded-lg max-w-[280px] sm:max-w-xs backdrop-blur-sm shadow-lg">
                <h2 class="text-lg md:text-xl font-semibold text-primary-400 mb-2 font-sans">Spatial Vision</h2>
                <p class="text-xs md:text-sm text-gray-300 font-sans font-normal">Menghadirkan keseimbangan sempurna antara estetika dan fungsionalitas ruang.</p>
            </div>

            <!-- Featured Badge -->
            <div class="bg-primary-500 text-black px-3 py-1 rounded-full text-xs font-semibold flex items-center shadow-md">
                <svg class="w-3 h-3 mr-1.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                Featured
            </div>
        </div>

        <!-- Main Hero Text (Centered) -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center flex-grow flex flex-col justify-center py-10 md:py-0">
            <h1 class="font-sans text-5xl md:text-7xl font-black text-white leading-tight mb-6 text-shadow">
                Bangun Rumah <span class="text-primary-400">Impian Anda</span>
            </h1>
            <p class="text-xl md:text-2xl font-sans font-normal text-gray-300 max-w-2xl mx-auto mb-10 text-shadow"><?= htmlspecialchars($hero['subtitle'] ?? 'Desain modern, konstruksi berkualitas, dan solusi yang berkelanjutan untuk mewujudkan hunian ideal sesuai gaya hidup Anda.') ?></p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="#contact" class="bg-primary-500 hover:bg-primary-600 text-black font-sans font-bold py-3.5 px-8 rounded-md transition-all hover:scale-105 text-sm uppercase tracking-wider flex items-center justify-center">
                    Mulai Konsultasi Gratis <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </a>
                <a href="#portfolio" class="bg-black/50 hover:bg-black/70 border border-gray-700 text-white font-sans font-bold py-3.5 px-8 rounded-md transition-all hover:scale-105 text-sm uppercase tracking-wider backdrop-blur-sm flex items-center justify-center">
                    Lihat Hasil Karya <i class="fas fa-external-link-alt ml-2 text-xs"></i>
                </a>
            </div>
        </div>

        <!-- Bottom Bar Elements -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 pb-8 md:pb-12 flex justify-end items-end">

            <!-- Slider Navigation -->
            <div class="flex items-center space-x-3 bg-black/50 backdrop-blur-sm px-3 py-2 rounded-md">
                <button id="hero-prev" aria-label="Previous Slide" class="text-gray-400 hover:text-white transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                    <svg class="w-4 h-4 transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <div id="hero-pagination" class="text-xs font-sans font-medium text-gray-200 w-12 text-center">01 / <?= str_pad(count($hero_slides), 2, '0', STR_PAD_LEFT) ?></div>
                <button id="hero-next" aria-label="Next Slide" class="text-gray-400 hover:text-white transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-black text-white scroll-mt-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 opacity-0 translate-y-8 transition-all duration-700 ease-out">
            <h2 class="font-sans text-3xl sm:text-4xl font-black text-white mb-4"><?= $about['title'] ?></h2>
            <div class="w-24 h-1 bg-emerald-400 mx-auto mb-8"></div>
            <p class="font-sans font-normal max-w-3xl mx-auto text-gray-300 text-lg"><?= $about['description'] ?></p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($about['team'] as $index => $member): ?>
            <div class="bg-dark-900 p-6 rounded-lg shadow-md hover:shadow-xl transition-all hover:scale-[1.02] opacity-0 translate-y-8 transition-all duration-500 ease-out stagger-item" style="transition-delay: <?= 0.1 * ($index + 1) ?>s;">
                <div class="w-24 h-24 rounded-full bg-primary-100 mx-auto mb-4 flex items-center justify-center transform transition-transform hover:rotate-12">
                    <i class="fas fa-quote-left text-5xl text-primary-400 opacity-50 absolute top-6 left-6 -z-10"></i>
                </div>
                <h3 class="font-sans font-bold text-xl mb-2 text-center text-white"><?= $member['name'] ?></h3>
                <p class="font-sans font-medium text-primary-400 mb-3 text-center"><?= $member['position'] ?></p>
                <p class="font-sans font-normal text-gray-300 italic text-lg mb-6 leading-relaxed"><?= $member['bio'] ?></p>
                <div class="mt-4 flex justify-center items-center space-x-3">
                    <a href="#" class="text-gray-400 hover:text-primary-400 transition-colors"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-gray-400 hover:text-primary-400 transition-colors"><i class="fab fa-twitter"></i></a>
                    <a href="mailto:<?= strtolower(str_replace(' ', '.', $member['name'])) ?>@antosa.com" class="text-gray-400 hover:text-primary-400 transition-colors"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 scroll-mt-20 bg-black">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 opacity-0 translate-y-8 transition-all duration-700 ease-out">
            <h2 class="font-sans text-3xl sm:text-4xl font-black text-secondary-800 dark:text-dark-100 mb-4"><?= $services['title'] ?></h2>
            <div class="w-24 h-1 bg-primary-500 mx-auto mb-8"></div>
            <p class="font-sans font-normal max-w-3xl mx-auto text-secondary-600 dark:text-dark-300 text-lg"><?= $services['subtitle'] ?></p>
        </div>

        <!-- Content Toggle Switch -->
        <div class="my-12 flex justify-center opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100">
            <div class="inline-flex rounded-full bg-dark-900 p-1 shadow-md">
                <button id="btn-layanan" class="px-6 py-2.5 text-sm font-semibold rounded-full bg-primary-500 text-white focus:outline-none transition-all duration-300 ease-in-out">
                    Layanan Kami
                </button>
                <button id="btn-pencapaian" class="px-6 py-2.5 text-sm font-semibold rounded-full text-gray-300 hover:text-white focus:outline-none transition-all duration-300 ease-in-out">
                    Pencapaian
                </button>
            </div>
        </div>

        <!-- Content Panels -->
        <div id="panel-layanan" class="content-panel">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ($services['services'] as $index => $service): ?>
            <div class="bg-dark-900 p-8 rounded-lg shadow-md hover:shadow-xl border-t-4 border-emerald-400 transition-all duration-300 group opacity-0 translate-y-8 transition-all duration-500 ease-out stagger-item" 
                 data-service="<?= strtolower(str_replace(' ', '-', $service['title'])) ?>">
                <div class="w-16 h-16 rounded-full bg-primary-100 dark:bg-dark-800 flex items-center justify-center mb-6 group-hover:bg-primary-500 dark:group-hover:bg-primary-600 transition-colors transform-gpu group-hover:rotate-y-180">
                    <i class="fas fa-<?= $service['icon'] ?> text-2xl text-primary-600 dark:text-primary-400 group-hover:text-white dark:group-hover:text-gray-100 transition-colors"></i>
                </div>
                <h3 class="font-sans font-bold text-xl mb-3 text-white"><?= $service['title'] ?></h3>
                <p class="font-sans font-normal text-gray-300 mb-4"><?= $service['description'] ?></p>
                <div class="mt-4 pt-4 border-t border-secondary-100 dark:border-dark-700 hidden group-hover:block transition-all overflow-hidden">
                    <a href="#contact" class="font-sans text-primary-600 dark:text-primary-400 hover:text-primary-800 dark:hover:text-primary-300 font-medium transition-colors flex items-center">
                        <span>Konsultasi <?= $service['title'] ?></span>
                        <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
            </div> <!-- End of grid for Layanan Kami -->
        </div> <!-- End of panel-layanan -->

        <div id="panel-pencapaian" class="content-panel hidden">
            <!-- Placeholder for Pencapaian content -->
            <div class="text-center py-12">
                <h3 class="text-2xl font-semibold text-gray-100 mb-4">Pencapaian Kami</h3>
                <p class="text-gray-300 max-w-xl mx-auto mb-8">Informasi mengenai pencapaian dan statistik Antosa Architect akan ditampilkan di sini. Ini bisa berupa jumlah proyek selesai, kepuasan klien, penghargaan, dll.</p>
                <div class="inline-flex flex-wrap justify-center gap-4 sm:gap-6 lg:gap-8">
                    <?php foreach ($services['stats'] ?? [] as $stat): ?>
                    <div class="bg-dark-900 hover:bg-dark-700 rounded-lg p-6 shadow-lg w-full sm:w-48 text-center transition-all transform hover:scale-105">
                        <div class="font-sans text-4xl font-bold text-primary-400 mb-2 counter" data-target="<?= $stat['value'] ?>">0</div>
                        <div class="font-sans font-normal text-gray-300 text-sm"><?= $stat['label'] ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div> <!-- End of panel-pencapaian -->
        

    </div>
</section>

<!-- Portfolio Section -->
<section id="portfolio" class="py-20 bg-black scroll-mt-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 opacity-0 translate-y-8 transition-all duration-700 ease-out">
            <h2 class="font-sans text-3xl sm:text-4xl font-black text-secondary-800 dark:text-dark-100 mb-4"><?= $portfolio['title'] ?></h2>
            <div class="w-24 h-1 bg-primary-500 mx-auto mb-8"></div>
            <p class="font-sans font-normal max-w-3xl mx-auto text-secondary-600 dark:text-dark-300 text-lg"><?= $portfolio['subtitle'] ?></p>
        </div>
        
        <!-- Portfolio Filter -->
        <div class="flex flex-wrap justify-center gap-4 mb-12 opacity-0 translate-y-8 transition-all duration-700 ease-out" style="transition-delay: 0.2s;">
            <button class="filter-btn active font-sans py-3 px-8 rounded-full bg-primary-500 text-white font-medium transition-all shadow-md hover:shadow-lg" data-filter="all">
                <i class="fas fa-border-all mr-2"></i> Semua Proyek
            </button>
            <button class="filter-btn font-sans py-3 px-8 rounded-full bg-white dark:bg-dark-900 dark:border dark:border-dark-700 text-secondary-700 dark:text-dark-300 font-medium transition-all shadow-md hover:shadow-lg hover:bg-primary-50 dark:hover:bg-dark-700 dark:hover:border-dark-600" data-filter="Residensial">
                <i class="fas fa-home mr-2"></i> Residensial
            </button>
            <button class="filter-btn font-sans py-3 px-8 rounded-full bg-white dark:bg-dark-900 dark:border dark:border-dark-700 text-secondary-700 dark:text-dark-300 font-medium transition-all shadow-md hover:shadow-lg hover:bg-primary-50 dark:hover:bg-dark-700 dark:hover:border-dark-600" data-filter="Komersial">
                <i class="fas fa-building mr-2"></i> Komersial
            </button>
            <button class="filter-btn font-sans py-3 px-8 rounded-full bg-white dark:bg-dark-900 dark:border dark:border-dark-700 text-secondary-700 dark:text-dark-300 font-medium transition-all shadow-md hover:shadow-lg hover:bg-primary-50 dark:hover:bg-dark-700 dark:hover:border-dark-600" data-filter="Hospitality">
                <i class="fas fa-hotel mr-2"></i> Hospitality
            </button>
        </div>
        
        <!-- Portfolio Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
            <?php foreach ($portfolio['projects'] as $index => $project): ?>
            <div class="portfolio-item group overflow-hidden rounded-lg shadow-md bg-dark-900 opacity-0 translate-y-10 transition-all duration-500 ease-out" 
                 data-category="<?= $project['category'] ?>" 
                 style="transition-delay: <?= 0.05 * ($index + 1) ?>s;">
                <div class="relative overflow-hidden">
                    <!-- Project images from Unsplash that match the project type -->
                    <div class="h-64 bg-secondary-200 dark:bg-dark-800 overflow-hidden">
                        <?php
                        // Define specific image URLs based on project category
                        $imageUrls = [
                            'Residensial' => [
                                'Villa Pesisir' => 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80',
                                'Apartment Sky View' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                                'Rumah Minimalis Sejuk' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'
                            ],
                            'Komersial' => [
                                'Kantor Modern Greenspace' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                                'Restoran Archipelago' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'
                            ],
                            'Hospitality' => [
                                'Butik Hotel Cerita' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'
                            ]
                        ];
                        
                        // Get image URL for current project
                        $imageUrl = $imageUrls[$project['category']][$project['title']] ?? 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80';
                        ?>
                        <img src="<?= $imageUrl ?>" 
                             data-src="<?= $imageUrl ?>" 
                             alt="<?= $project['title'] ?>" 
                             class="w-full h-full object-cover transition-all duration-500 group-hover:scale-110">
                        
                        <!-- Overlay with quick view -->
                        <div class="absolute inset-0 bg-secondary-900 bg-opacity-0 group-hover:bg-opacity-75 flex items-center justify-center transition-all duration-300 opacity-0 group-hover:opacity-100">
                            <button class="bg-white dark:bg-dark-800 text-secondary-800 dark:text-dark-100 hover:bg-primary-500 dark:hover:bg-primary-600 hover:text-white dark:hover:text-gray-50 p-3 rounded-full transform translate-y-4 group-hover:translate-y-0 transition-all duration-300" 
                                    onclick="openProjectModal('<?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') ?>', '<?= $imageUrl ?>', '<?= htmlspecialchars($project['description'] ?? '', ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['category'], ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['client'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['year'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['location'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['area'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>')">
                                <i class="fas fa-search-plus"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Category Badge -->
                    <div class="absolute top-4 right-4 bg-primary-500 text-white text-sm font-sans font-medium py-1 px-3 rounded-full shadow-md transform translate-x-4 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300">
                        <?= $project['category'] ?>
                    </div>
                </div>
                
                <div class="p-6">
                    <h3 class="font-sans font-bold text-xl mb-2 text-white group-hover:text-emerald-400 transition-colors"><?= $project['title'] ?></h3>
                    <p class="font-sans font-normal text-gray-300 mb-4"><?= substr($project['description'] ?? '', 0, 100) ?>...</p>
                    <a href="#" class="font-sans text-emerald-400 hover:text-emerald-300 font-medium inline-flex items-center group" 
                       onclick="openProjectModal('<?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') ?>', '<?= $imageUrl ?>', '<?= htmlspecialchars($project['description'] ?? '', ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['category'], ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['client'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['year'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['location'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>', '<?= htmlspecialchars($project['area'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>'); return false;">
                        Lihat Detail 
                        <svg class="w-4 h-4 ml-2 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-20 bg-black scroll-mt-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 opacity-0 translate-y-8 transition-all duration-700 ease-out">
            <h2 class="font-sans text-3xl sm:text-4xl font-black text-secondary-800 dark:text-dark-100 mb-4"><?= $testimonials['title'] ?></h2>
            <div class="w-24 h-1 bg-primary-500 mx-auto mb-8"></div>
            <p class="font-sans font-normal max-w-3xl mx-auto text-secondary-600 dark:text-dark-300 text-lg"><?= $testimonials['subtitle'] ?></p>
        </div>
        
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($testimonials['testimonials'] as $testimonial): ?>
                <div class="bg-secondary-50 dark:bg-dark-900 p-8 rounded-lg shadow-lg relative testimonial-card pb-10 opacity-0 translate-y-8 transition-all duration-500 ease-out stagger-item">
                    <div class="absolute -top-5 left-8">
                        <span class="text-6xl text-primary-300 dark:text-primary-600">"</span>
                    </div>
                    <div class="pt-6">
                        <p class="font-sans font-normal text-secondary-600 dark:text-dark-200 mb-6 italic"><?= $testimonial['text'] ?></p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full mr-4 overflow-hidden">
                                <img src="<?= htmlspecialchars($testimonial['image']) ?>" alt="<?= htmlspecialchars($testimonial['name']) ?>" class="w-full h-full object-cover" loading="lazy">
                            </div>
                            <div>
                                <h4 class="font-sans font-bold"><?= $testimonial['name'] ?></h4>
                                <p class="font-sans font-normal text-gray-500 text-sm"><?= $testimonial['position'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <i class="fas fa-star <?= $i <= $testimonial['rating'] ? 'text-yellow-400 dark:text-yellow-400' : 'text-secondary-300 dark:text-dark-600' ?>"></i>
                        <?php endfor; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section id="faq" class="py-20 bg-black text-white scroll-mt-20">
  <div class="container mx-auto px-4">
    <h2 class="font-sans text-3xl sm:text-4xl font-black mb-4 text-center">Pertanyaan Umum</h2>
    <p class="mb-10 text-center text-gray-400">Temukan jawaban atas pertanyaan yang sering diajukan tentang layanan kami.</p>
    <div class="flex flex-col md:flex-row gap-8">
      <!-- Categories -->
      <aside class="md:w-1/4">
        <div class="bg-dark-900 rounded-xl shadow-lg border border-dark-700 p-4">
          <?php $firstCat = true; foreach ($faq['categories'] as $cat => $items): ?>
            <button type="button"
              class="faq-category w-full text-left px-4 py-3 mb-2 rounded-lg transition font-medium flex items-center gap-2
                <?php if ($firstCat) {echo 'bg-primary-500 text-white shadow';} else {echo 'bg-dark-800 text-gray-300 hover:bg-dark-700';} ?>"
              data-category="<?= htmlspecialchars($cat) ?>">
              <?php if ($cat === 'Umum'): ?><i class="fa fa-question-circle"></i><?php elseif ($cat === 'Desain'): ?><i class="fa fa-pencil-ruler"></i><?php elseif ($cat === 'Biaya'): ?><i class="fa fa-wallet"></i><?php endif; ?>
              <?= htmlspecialchars($cat) ?>
            </button>
          <?php $firstCat = false; endforeach; ?>
        </div>
      </aside>
      <!-- Questions/Answers -->
      <div class="md:w-3/4">
        <?php $firstPanel = true; foreach ($faq['categories'] as $cat => $items): ?>
          <div class="faq-panel <?php if (!$firstPanel) echo 'hidden'; ?>" data-category="<?= htmlspecialchars($cat) ?>">
            <?php foreach ($items as $q): ?>
              <div class="faq-item bg-dark-900 border border-dark-700 rounded-xl shadow mb-4 overflow-hidden">
                <button type="button" class="faq-question w-full flex justify-between items-center px-6 py-4 text-base md:text-lg font-semibold text-left focus:outline-none">
                  <span><?= htmlspecialchars($q['question']) ?></span>
                  <span class="faq-toggle-icon ml-2 transition"><i class="fa fa-chevron-down"></i></span>
                </button>
                <div class="faq-answer hidden px-6 pb-6 text-gray-300 text-sm md:text-base leading-relaxed border-t border-dark-800"><?= htmlspecialchars($q['answer']) ?></div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php $firstPanel = false; endforeach; ?>
      </div>
    </div>
    <div class="mt-10 text-center bg-dark-900 rounded-xl shadow-lg border border-dark-700 p-6">
      <span class="font-bold text-lg">Masih punya pertanyaan?</span>
      <p class="text-gray-400 mb-2">Tim kami siap membantu menjawab segala pertanyaan Anda tentang layanan kami.</p>
      <a href="#contact" class="text-emerald-400 hover:underline font-medium">Hubungi Kami <i class="fa fa-arrow-right"></i></a>
    </div>
  </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-black scroll-mt-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 opacity-0 translate-y-8 transition-all duration-700 ease-out">
            <h2 class="font-sans text-3xl sm:text-4xl font-black text-secondary-800 dark:text-dark-100 mb-4">Hubungi Kami</h2>
            <div class="w-24 h-1 bg-primary-500 mx-auto mb-8"></div>
            <p class="font-sans font-normal max-w-3xl mx-auto text-secondary-600 dark:text-dark-300 text-lg">Punya pertanyaan atau ingin memulai proyek dengan kami? Jangan ragu untuk menghubungi kami.</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div id="contact-form" class="bg-white dark:bg-dark-900 p-8 md:p-12 rounded-xl shadow-2xl opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100">
                <h3 class="font-sans text-2xl font-bold mb-6 dark:text-dark-100">Kirim Pesan</h3>
                <form action="<?= url('/send-inquiry') ?>" method="POST">
                    <div class="mb-6">
                        <label for="name" class="font-sans font-medium text-sm text-secondary-500 dark:text-gray-400 mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="w-full p-3 bg-secondary-50 dark:bg-dark-800 border border-secondary-300 dark:border-dark-700 rounded-lg text-secondary-900 dark:text-dark-100 focus:ring-dark-500 focus:border-primary-500 dark:focus:ring-dark-500 dark:focus:border-primary-400 transition-colors placeholder-secondary-400 dark:placeholder-dark-400" placeholder="Masukkan nama lengkap Anda" required>
                    </div>
                    
                    <div class="mb-6">
                        <label for="email" class="font-sans font-medium text-sm text-secondary-500 dark:text-gray-400 mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full p-3 bg-secondary-50 dark:bg-dark-800 border border-secondary-300 dark:border-dark-700 rounded-lg text-secondary-900 dark:text-dark-100 focus:ring-dark-500 focus:border-primary-500 dark:focus:ring-dark-500 dark:focus:border-primary-400 transition-colors placeholder-secondary-400 dark:placeholder-dark-400" placeholder="Masukkan alamat email Anda" required>
                    </div>
                    
                    <div class="mb-6">
                        <label for="phone" class="font-sans font-medium text-sm text-secondary-500 dark:text-gray-400 mb-2">Nomor Telepon</label>
                        <input type="tel" id="phone" name="phone" class="w-full p-3 bg-secondary-50 dark:bg-dark-800 border border-secondary-300 dark:border-dark-700 rounded-lg text-secondary-900 dark:text-dark-100 focus:ring-dark-500 focus:border-primary-500 dark:focus:ring-dark-500 dark:focus:border-primary-400 transition-colors placeholder-secondary-400 dark:placeholder-dark-400" placeholder="Masukkan nomor telepon Anda" required>
                    </div>
                    
                    <div class="mb-6">
                        <label for="message" class="font-sans font-medium text-sm text-secondary-500 dark:text-gray-400 mb-2">Pesan</label>
                        <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 bg-secondary-50 dark:bg-dark-700 border border-secondary-300 dark:border-dark-600 rounded-md text-secondary-900 dark:text-dark-100 focus:ring-dark-500 focus:border-primary-500 dark:focus:ring-dark-500 dark:focus:border-primary-400 transition-colors resize-none placeholder-secondary-400 dark:placeholder-dark-500" placeholder="Deskripsikan proyek atau pertanyaan Anda" required></textarea>
                    </div>
                    
                    <button type="submit" class="font-sans w-full py-3 px-6 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-md transition-colors">
                        Kirim Pesan
                    </button>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div>
                <div class="bg-dark-900 text-white p-8 rounded-lg shadow-md mb-8 opacity-0 translate-y-8 transition-all duration-700 ease-out delay-200">
                    <h3 class="font-sans text-2xl font-bold mb-6">Informasi Kontak</h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-full bg-primary-500/20 flex items-center justify-center mr-4">
                                <i class="fas fa-map-marker-alt mt-1 mr-3 text-primary-500 dark:text-primary-400"></i>
                            </div>
                            <div>
                                <h4 class="font-sans font-semibold text-lg mb-1">Alamat</h4>
                                <p class="font-sans font-normal text-gray-300"><?= COMPANY_ADDRESS ?></p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-full bg-primary-500/20 flex items-center justify-center mr-4">
                                <i class="fas fa-phone-alt mr-3 text-primary-500 dark:text-primary-400"></i>
                            </div>
                            <div>
                                <h4 class="font-sans font-semibold text-lg mb-1">Telepon</h4>
                                <p class="font-sans font-normal text-gray-300"><?= COMPANY_PHONE ?></p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-full bg-primary-500/20 flex items-center justify-center mr-4">
                                <i class="fas fa-envelope mr-3 text-primary-500 dark:text-primary-400"></i>
                            </div>
                            <div>
                                <h4 class="font-sans font-semibold text-lg mb-1">Email</h4>
                                <p class="font-sans font-normal text-gray-300"><?= COMPANY_EMAIL ?></p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-full bg-primary-500/20 flex items-center justify-center mr-4">
                                <i class="fas fa-clock mr-3 text-primary-500 dark:text-primary-400"></i>
                            </div>
                            <div>
                                <h4 class="font-sans font-semibold text-lg mb-1">Jam Kerja</h4>
                                <p class="font-sans font-normal text-gray-300"><?= OFFICE_HOURS ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Google Maps Integration -->
                <div class="rounded-lg overflow-hidden shadow-md h-96 opacity-0 translate-y-8 transition-all duration-700 ease-out delay-300">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.515560073746!2d113.69243997242727!3d-8.150696587006067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695266ceb2fbb%3A0x4f7d8c2cd93f9499!2sANTOSA%20ARCHITECT%20%7C%20JASA%20ARSITEK%20PROFESIONAL%20BERLISENSI!5e0!3m2!1sen!2sid!4v1749265217676!5m2!1sen!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'layouts/partials/footer.php'; ?>

<!-- Project Modal -->
<div id="project-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="absolute inset-0 bg-dark-950 bg-opacity-75 backdrop-blur-sm transition-opacity duration-300 opacity-0" id="modal-overlay"></div>
    
    <div class="relative bg-white dark:bg-dark-900 rounded-lg shadow-xl w-full max-w-2xl mx-auto transform transition-all duration-300 ease-out scale-90 opacity-0" id="modal-container">
        <!-- Close button -->
        <button id="modal-close" class="absolute top-4 right-4 text-secondary-500 dark:text-dark-400 hover:text-secondary-700 dark:hover:text-dark-100 text-2xl focus:outline-none z-10">
            <i class="fas fa-times text-xl"></i>
        </button>
        
        <!-- Modal content -->
        <div class="flex flex-col md:flex-row">
            <!-- Project image -->
            <div class="md:w-1/2">
                <img id="modal-image" src="" alt="Project" class="w-full h-full object-cover">
            </div>
            
            <!-- Project details -->
            <div class="md:w-1/2 p-8">
                <span id="modal-category" class="text-sm text-primary-500 dark:text-primary-400 font-medium tracking-wider uppercase">x-3 py-1 rounded-full text-sm font-medium mb-4"></span>
                <h3 id="modal-title" class="text-2xl font-bold text-secondary-800 dark:text-dark-100 mb-2"></h3>
                <div id="modal-description" class="text-secondary-600 dark:text-dark-300 my-4 text-lg leading-relaxed">
                
                <div class="border-t border-secondary-200 pt-4 mt-4">
                    <h4 class="font-bold text-lg mb-2">Detail Proyek</h4>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-500 text-sm">Klien</p>
                            <p id="modal-client" class="font-medium">PT Sejahtera Abadi</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Tahun</p>
                            <p id="modal-year" class="font-medium">2024</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Lokasi</p>
                            <p id="modal-location" class="font-medium">Jakarta Selatan</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Luas</p>
                            <p id="modal-area" class="font-medium">450 m²</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6">
                    <a href="#contact" class="bg-primary-500 hover:bg-primary-600 text-white font-medium py-2 px-6 rounded-md transition-colors inline-flex items-center" id="modal-contact-btn">
                        <i class="fas fa-envelope mr-2"></i> Konsultasikan Proyek Serupa
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<body>
<script src="<?= asset('js/main.js') ?>"></script>
<script src="<?= asset('js/content-toggle.js') ?>"></script>
<script src="<?= asset('js/hero-slider.js') ?>"></script>
<script src="<?= asset('js/home-portfolio.js') ?>"></script>
<script src="<?= asset('js/faq.js') ?>"></script>
</body>

<?php
// Get the content from output buffer
$content = ob_get_clean();

// Include the layout with the content
require VIEWS_DIR . '/layouts/main.php';
?>
