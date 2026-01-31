<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Site Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi umum untuk website perumahan. Edit file ini untuk mengubah
    | informasi perumahan, kontak, dan meta tags di seluruh website.
    |
    */

    // Informasi Perumahan
    'name' => 'Perumahan Griya Citra Kayumanis',
    'tagline' => 'Sistem informasi perumahan yang memudahkan Anda mengetahui denah, penghuni, dan status rumah di lingkungan kita',
    'description' => 'Sistem informasi perumahan yang memudahkan pengelolaan dan komunikasi antar warga.',
    
    // Meta Tags
    'meta' => [
        'title' => 'Perumahan Griya Citra Kayumanis - Sistem Informasi Perumahan',
        'description' => 'Website resmi Perumahan Griya Citra Kayumanis - Sistem informasi perumahan yang memudahkan Anda mengetahui denah, penghuni, dan status rumah',
        'keywords' => 'perumahan, perumahan griya citra kayumanis, sistem informasi perumahan, denah perumahan, fasilitas perumahan',
        'author' => 'Fiqih Badrian',
        'image' => '/images/perumahan-og.jpg', // Open Graph image
    ],

    // Informasi Kontak
    'contact' => [
        'address' => [
            'street' => 'Jl. Perumahan Griya Citra Kayumanis Blok B No. 1',
            'city' => 'Bogor Kota',
            'province' => 'Jawa Barat',
            'postal_code' => '16168',
        ],
        'phone' => [
            '+62 21 1234 5678',
            '+62 812 3456 7890',
        ],
        'email' => [
            'info@gckm.com',
            'admin@gckm.com',
        ],
        'operating_hours' => [
            'weekdays' => 'Senin - Jumat: 08.00 - 17.00',
            'saturday' => 'Sabtu: 08.00 - 12.00',
            'sunday' => 'Tutup',
        ],
    ],

    // Social Media
    'social' => [
        'facebook' => '#',
        'twitter' => '#',
        'instagram' => '#',
        'whatsapp' => '#',
        'youtube' => null, // Set null jika tidak digunakan
        'tiktok' => null,
    ],

    // Developer Info
    'developer' => [
        'name' => 'Fiqih Badrian',
        'website' => 'https://fiqihbadrian.com',
        'email' => 'fiqih@example.com',
        'year' => '2026',
    ],

    // Assets
    'assets' => [
        'logo' => '/images/logo.png',
        'map' => 'https://raw.githubusercontent.com/fiqihbadrian/acc-jambu-2/refs/heads/main/peta.png',
    ],

    // Features (Fasilitas)
    'facilities' => [
        [
            'icon' => 'fa-shield-alt',
            'color' => 'blue',
            'title' => 'Keamanan 24 Jam',
            'description' => 'Sistem keamanan terpadu dengan petugas security yang siap menjaga keamanan perumahan setiap saat.',
        ],
        [
            'icon' => 'fa-tree',
            'color' => 'green',
            'title' => 'Taman & Area Hijau',
            'description' => 'Taman yang asri dan area hijau untuk refreshing dan aktivitas keluarga di akhir pekan.',
        ],
        [
            'icon' => 'fa-wifi',
            'color' => 'purple',
            'title' => 'WiFi Area Umum',
            'description' => 'Koneksi internet gratis di area umum untuk memudahkan komunikasi dan pekerjaan.',
        ],
        [
            'icon' => 'fa-dumbbell',
            'color' => 'orange',
            'title' => 'Fitness Center',
            'description' => 'Fasilitas fitness lengkap untuk menjaga kesehatan dan kebugaran tubuh Anda.',
        ],
        [
            'icon' => 'fa-swimming-pool',
            'color' => 'red',
            'title' => 'Kolam Renang',
            'description' => 'Kolam renang bersih dan terawat untuk olahraga dan rekreasi keluarga.',
        ],
        [
            'icon' => 'fa-child',
            'color' => 'yellow',
            'title' => 'Playground Anak',
            'description' => 'Area bermain anak yang aman dan menyenangkan dengan berbagai permainan edukatif.',
        ],
    ],

];
