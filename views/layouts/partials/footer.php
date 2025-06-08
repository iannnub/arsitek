<?php
/**
 * Site Footer - Modernized
 */

// Data for footer links and information
$companyName = "Antosa Architect";
$companyDescription = "Studio arsitektur profesional yang mewujudkan visi Anda menjadi ruang yang fungsional dan estetis.";

$socialLinks = [
    ['icon' => 'fab fa-facebook-f', 'url' => '#', 'label' => 'Facebook'],
    ['icon' => 'fab fa-instagram', 'url' => '#', 'label' => 'Instagram'],
    ['icon' => 'fab fa-linkedin-in', 'url' => '#', 'label' => 'LinkedIn'],
    ['icon' => 'fab fa-pinterest-p', 'url' => '#', 'label' => 'Pinterest'],
];

$quickLinks = [
    ['text' => 'Beranda', 'url' => '/'], // Assuming root path for home
    ['text' => 'Tentang Kami', 'url' => '/tentang-kami'],
    ['text' => 'Layanan', 'url' => '/layanan'],
    ['text' => 'Portofolio', 'url' => '/portofolio'],
    ['text' => 'Testimoni', 'url' => '/testimoni'],
    ['text' => 'Blog', 'url' => '/blog'],
    ['text' => 'Hubungi Kami', 'url' => '/kontak'],
];

$serviceLinks = [
    ['text' => 'Desain Arsitektur', 'url' => '/layanan#desain-arsitektur'],
    ['text' => 'Desain Interior', 'url' => '/layanan#desain-interior'],
    ['text' => 'Konsultasi Proyek', 'url' => '/layanan#konsultasi-proyek'],
    ['text' => 'Manajemen Konstruksi', 'url' => '/layanan#manajemen-konstruksi'],
    ['text' => 'Desain Lanskap', 'url' => '/layanan#desain-lanskap'],
];

$contactInfo = [
    ['icon' => 'fas fa-map-marker-alt', 'lines' => ['Bernady Land, Cluster Camelia Blok E6, Puring, Slawu, Kec. Patrang, Kabupaten Jember, Jawa Timur 68116'], 'type' => 'address'],
    ['icon' => 'fas fa-phone-alt', 'text' => '+62 851 8952 3863', 'type' => 'phone', 'url' => 'tel:+6285189523863'],
    ['icon' => 'fas fa-envelope', 'text' => 'info@antosaarchitect.com', 'type' => 'email', 'url' => 'mailto:info@antosaarchitect.com'],
    ['icon' => 'fas fa-clock', 'text' => 'Senin - Jumat: 08:00 - 17:00 WIB', 'type' => 'hours'],
];

// Styling variables for consistency and easier updates
$footerBgColor = "bg-dark-900";
$footerTextColor = "text-dark-300";
$headingClasses = "text-sm font-semibold text-white uppercase tracking-wider mb-6";
$companyNameClasses = "text-lg font-bold text-white mb-3";
$paragraphClasses = "text-dark-400 text-sm mb-6 leading-relaxed";
$socialIconClasses = "text-dark-400 hover:text-primary-400 transition-colors duration-300 text-xl";
$listLinkClasses = "text-dark-400 hover:text-primary-400 transition-colors duration-300 text-sm py-1 block";
$contactIconClasses = "text-primary-500 text-lg flex-shrink-0"; // Added flex-shrink-0
$contactTextClasses = "text-dark-400 text-sm";
$dividerColor = "border-dark-700";
$copyrightTextClasses = "text-dark-500 text-xs";
$bottomLinkClasses = "text-dark-500 hover:text-primary-400 text-xs mx-2.5 transition-colors duration-300";

?>
<footer class="<?= $footerBgColor ?> <?= $footerTextColor ?> py-16 sm:py-20">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 md:gap-12 mb-12">
            <!-- Company Info -->
            <div>
                <h3 class="<?= $companyNameClasses ?>"><?= htmlspecialchars($companyName) ?></h3>
                <p class="<?= $paragraphClasses ?>"><?= htmlspecialchars($companyDescription) ?></p>
                <div class="flex space-x-5">
                    <?php foreach ($socialLinks as $link): ?>
                        <a href="<?= htmlspecialchars($link['url']) ?>" target="_blank" rel="noopener noreferrer" class="<?= $socialIconClasses ?>" aria-label="<?= htmlspecialchars($link['label']) ?>">
                            <i class="<?= htmlspecialchars($link['icon']) ?>"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h3 class="<?= $headingClasses ?>">Navigasi</h3>
                <ul class="space-y-2.5">
                    <?php foreach ($quickLinks as $link): ?>
                        <li><a href="<?= htmlspecialchars($link['url']) ?>" class="<?= $listLinkClasses ?>"><?= htmlspecialchars($link['text']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Services -->
            <div>
                <h3 class="<?= $headingClasses ?>">Layanan Utama</h3>
                <ul class="space-y-2.5">
                    <?php foreach ($serviceLinks as $link): ?>
                        <li><a href="<?= htmlspecialchars($link['url']) ?>" class="<?= $listLinkClasses ?>"><?= htmlspecialchars($link['text']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div>
                <h3 class="<?= $headingClasses ?>">Hubungi Kami</h3>
                <ul class="space-y-4">
                    <?php foreach ($contactInfo as $item): ?>
                        <li class="flex <?= $item['type'] === 'address' ? 'items-start' : 'items-center' ?>">
                            <i class="<?= htmlspecialchars($item['icon']) ?> <?= $contactIconClasses ?> mr-3.5 <?= $item['type'] === 'address' ? 'mt-1' : '' ?>"></i>
                            <span class="<?= $contactTextClasses ?>">
                                <?php if (isset($item['lines'])): ?>
                                    <?php foreach ($item['lines'] as $line): ?>
                                        <?= htmlspecialchars($line) ?><br>
                                    <?php endforeach; ?>
                                <?php elseif (isset($item['url'])): ?>
                                    <a href="<?= htmlspecialchars($item['url']) ?>" class="hover:text-primary-400 transition-colors duration-300"><?= htmlspecialchars($item['text']) ?></a>
                                <?php else: ?>
                                    <?= htmlspecialchars($item['text']) ?>
                                <?php endif; ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        
        <div class="border-t <?= $dividerColor ?> pt-8 flex flex-col sm:flex-row justify-between items-center">
            <p class="<?= $copyrightTextClasses ?> mb-4 sm:mb-0">&copy; <?= date('Y') ?> <?= htmlspecialchars($companyName) ?>. Hak Cipta Dilindungi.</p>
            <div class="flex items-center">
                <a href="/syarat-ketentuan" class="<?= $bottomLinkClasses ?>">Syarat & Ketentuan</a>
                <span class="<?= $copyrightTextClasses ?>">|</span>
                <a href="/kebijakan-privasi" class="<?= $bottomLinkClasses ?>">Kebijakan Privasi</a>
            </div>
        </div>
    </div>
</footer>
