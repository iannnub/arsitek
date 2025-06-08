<?php

/**
 * Home Controller
 * 
 * Handles requests for the main landing page
 */
class HomeController
{
    /**
     * Display the home page
     * 
     * @return void
     */
    public function index()
    {
        
        $aboutData = [
            'title' => 'Tentang Kami',
            'description' => 'Antosa Architect adalah studio arsitektur profesional yang berdedikasi untuk menciptakan ruang fungsional dengan sentuhan estetika yang memukau. Dengan pengalaman lebih dari 10 tahun, kami telah menyelesaikan berbagai proyek dari residensial hingga komersial.',
            'team' => [
                [
                    'name' => 'Ahmad Farhan',
                    'position' => 'Principal Architect',
                    'bio' => 'Berpengalaman lebih dari 10 tahun dalam bidang arsitektur.',
                    'image' => 'https://source.unsplash.com/100x100/?portrait,man,architect&sig=1'
                ],
                [
                    'name' => 'Siti Aisyah',
                    'position' => 'Interior Designer',
                    'bio' => 'Spesialis desain interior yang menggabungkan fungsi dan estetika.',
                    'image' => 'https://source.unsplash.com/100x100/?portrait,woman,designer&sig=2'
                ],
                [
                    'name' => 'Budi Santoso',
                    'position' => 'Project Manager',
                    'bio' => 'Ahli dalam mengelola proyek konstruksi tepat waktu dan sesuai anggaran.',
                    'image' => 'https://source.unsplash.com/100x100/?portrait,man,manager&sig=3'
                ]
            ]
        ];
        
        $servicesData = [
            'title' => 'Layanan Kami',
            'subtitle' => 'Kami menyediakan berbagai layanan arsitektur dan desain interior yang sesuai dengan kebutuhan Anda',
            'services' => [
                [
                    'title' => 'Desain Arsitektur',
                    'description' => 'Menciptakan desain bangunan yang indah, fungsional dan berkelanjutan sesuai visi Anda',
                    'icon' => 'building'
                ],
                [
                    'title' => 'Desain Interior',
                    'description' => 'Mengubah ruang interior menjadi lingkungan yang nyaman, fungsional dan estetis',
                    'icon' => 'couch'
                ],
                [
                    'title' => 'Konsultasi Proyek',
                    'description' => 'Memberikan saran profesional dan solusi untuk proyek renovasi atau konstruksi baru',
                    'icon' => 'comments'
                ],
                [
                    'title' => 'Manajemen Konstruksi',
                    'description' => 'Mengawasi proyek dari awal hingga selesai untuk memastikan kualitas dan efisiensi',
                    'icon' => 'tasks'
                ]
            ],
            'stats' => [
                [
                    'value' => 239,
                    'label' => 'Proyek Selesai'
                ],
                [
                    'value' => 179,
                    'label' => 'Arsitektur'
                ],
                [
                    'value' => 58,
                    'label' => 'Konstruksi'
                ],
            ]
        ];
        
        $portfolioData = [
            'title' => 'Portofolio Proyek',
            'subtitle' => 'Portofolio proyek yang telah kami kerjakan',
            'projects' => [
                [
                    'title' => 'Villa Pesisir',
                    'category' => 'Residensial',
                    'location' => 'Bali',
                    'year' => '2023',
                    'description' => 'Villa mewah dengan pemandangan laut yang menakjubkan. Desain modern yang menyatu dengan alam.',
                ],
                [
                    'title' => 'Kantor Modern Greenspace',
                    'category' => 'Komersial',
                    'location' => 'Jakarta',
                    'year' => '2022',
                    'description' => 'Ruang kantor dengan konsep hijau yang mengutamakan produktivitas dan kesejahteraan karyawan.',
                ],
                [
                    'title' => 'Apartment Sky View',
                    'category' => 'Residensial',
                    'location' => 'Surabaya',
                    'year' => '2021',
                    'description' => 'Apartemen premium dengan pemandangan kota yang memukau. Desain interior yang elegan dan fungsional.',
                ],
                [
                    'title' => 'Restoran Archipelago',
                    'category' => 'Komersial',
                    'location' => 'Yogyakarta',
                    'year' => '2022',
                    'description' => 'Restoran dengan desain yang terinspirasi keindahan kepulauan Indonesia. Atmosfer yang nyaman dan instagramable.',
                ],
                [
                    'title' => 'Rumah Minimalis Sejuk',
                    'category' => 'Residensial',
                    'location' => 'Bandung',
                    'year' => '2023',
                    'description' => 'Rumah dengan desain minimalis modern yang memberikan kesejukan dan kenyamanan. Maksimal dalam fungsi, minimal dalam dekorasi.',
                ],
                [
                    'title' => 'Butik Hotel Cerita',
                    'category' => 'Hospitality',
                    'location' => 'Lombok',
                    'year' => '2022',
                    'description' => 'Butik hotel yang menawarkan pengalaman menginap unik dengan cerita lokal. Setiap kamar memiliki tema berbeda.',
                ]
            ]
        ];
        
        $testimonialData = [
            'title' => 'Apa Kata Klien Kami',
            'subtitle' => 'Dengarkan pengalaman klien yang telah bekerja sama dengan kami.',
            'testimonials' => [
                [
                    'name' => 'Aditya Pratama',
                    'position' => 'CEO, PT Maju Bersama',
                    'text' => 'Antosa Architect memahami kebutuhan kami dengan sangat baik. Mereka menerjemahkan visi kami menjadi desain kantor yang tidak hanya estetis tapi juga sangat fungsional untuk karyawan kami.',
                    'rating' => 5,
                    'image' => 'https://source.unsplash.com/100x100/?portrait,man,ceo&sig=4'
                ],
                [
                    'name' => 'Maya Anggraini',
                    'position' => 'Pemilik Rumah',
                    'text' => 'Saya sangat puas dengan desain rumah yang dikerjakan oleh tim Antosa. Mereka memperhatikan detail dan memberikan solusi kreatif untuk lahan terbatas yang kami miliki.',
                    'rating' => 5,
                    'image' => 'https://source.unsplash.com/100x100/?portrait,woman,homeowner&sig=5'
                ],
                [
                    'name' => 'Hendra Wijaya',
                    'position' => 'Pengembang Properti',
                    'text' => 'Sudah bekerja sama dengan Antosa Architect untuk 3 proyek perumahan kami. Selalu tepat waktu dan hasilnya selalu disukai oleh pembeli.',
                    'rating' => 5,
                    'image' => 'https://source.unsplash.com/100x100/?portrait,man,developer&sig=6'
                ]
            ]
        ];
        
        // FAQ Data
        $faqData = [
            'categories' => [
                'Umum' => [
                    [
                        'question' => 'Apa saja layanan utama yang ditawarkan oleh Antosa Architect?',
                        'answer' => 'Kami menawarkan layanan desain arsitektur, interior, konsultasi, dan manajemen konstruksi.'
                    ],
                    [
                        'question' => 'Bagaimana proses kerja sama dengan Antosa Architect?',
                        'answer' => 'Proses dimulai dari konsultasi, penentuan kebutuhan, desain konsep, pengembangan desain, hingga pelaksanaan dan pengawasan.'
                    ],
                    [
                        'question' => 'Berapa lama waktu yang dibutuhkan untuk menyelesaikan proyek?',
                        'answer' => 'Waktu pengerjaan tergantung pada skala dan kompleksitas proyek. Rata-rata proyek residensial memakan waktu 3-6 bulan.'
                    ]
                ],
                'Desain' => [
                    [
                        'question' => 'Bagaimana proses desain berjalan?',
                        'answer' => 'Proses desain meliputi konsultasi awal, pengumpulan data, pembuatan konsep, revisi, hingga finalisasi desain.'
                    ],
                    [
                        'question' => 'Apakah bisa revisi desain?',
                        'answer' => 'Tentu, kami menyediakan beberapa kali revisi sesuai kesepakatan awal agar hasil sesuai harapan Anda.'
                    ]
                ],
                'Biaya' => [
                    [
                        'question' => 'Bagaimana sistem pembayaran jasa?',
                        'answer' => 'Pembayaran dilakukan bertahap sesuai progres pekerjaan, dengan sistem termin yang jelas dan transparan.'
                    ],
                    [
                        'question' => 'Apakah konsultasi awal dikenakan biaya?',
                        'answer' => 'Konsultasi awal gratis tanpa biaya, silakan hubungi kami untuk membuat janji.'
                    ]
                ]
            ]
        ];

        // Combine all data
        $viewData = [
            'about' => $aboutData,
            'services' => $servicesData,
            'portfolio' => $portfolioData,
            'testimonials' => $testimonialData,
            'faq' => $faqData
        ];
        
        // Render the home page view
        view('home', $viewData);
    }
}
