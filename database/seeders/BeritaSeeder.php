<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berita;
use Carbon\Carbon;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        // Skip if beritas already exist
        if (Berita::count() > 0) {
            $this->command->info('ℹ️  Berita already exists');
            return;
        }
        
        $beritas = [
            [
                'title' => 'Acara Gotong Royong Warga',
                'slug' => 'acara-gotong-royong-warga',
                'content' => 'Bergabunglah dalam acara gotong royong untuk membersihkan lingkungan perumahan kita. Kegiatan ini akan dilaksanakan pada hari Minggu, 15 Juli 2024, pukul 07.00 WIB. Mari bersama-sama menciptakan lingkungan yang bersih dan nyaman untuk kita semua. Acara ini akan dimulai dengan senam pagi bersama, dilanjutkan dengan kegiatan pembersihan area perumahan, dan diakhiri dengan makan bersama. Jangan lupa membawa peralatan kebersihan seperti sapu, sekop, dan karung sampah.',
                'image' => null,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Pembangunan Fasilitas Olahraga Baru',
                'slug' => 'pembangunan-fasilitas-olahraga-baru',
                'content' => 'Kami dengan bangga mengumumkan bahwa pembangunan fasilitas olahraga baru akan segera dimulai di area Blok C. Fasilitas ini akan meliputi lapangan basket, lapangan badminton, dan area jogging track. Diharapkan pembangunan akan selesai dalam 3 bulan ke depan. Fasilitas ini dibangun untuk meningkatkan kualitas hidup warga dan mendukung gaya hidup sehat. Seluruh warga dapat menggunakan fasilitas ini secara gratis setelah pembangunan selesai.',
                'image' => null,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(10),
            ],
            [
                'title' => 'Peluncuran Sistem Keamanan 24 Jam',
                'slug' => 'peluncuran-sistem-keamanan-24-jam',
                'content' => 'Demi meningkatkan keamanan dan kenyamanan warga, kami telah meluncurkan sistem keamanan 24 jam dengan CCTV di setiap sudut perumahan. Tim security kami telah dilatih secara profesional dan siap melayani 24/7. Sistem ini juga dilengkapi dengan aplikasi mobile yang memungkinkan warga untuk melihat aktivitas di area perumahan secara real-time. Untuk informasi lebih lanjut mengenai penggunaan aplikasi, silakan hubungi kantor pengelola perumahan.',
                'image' => null,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(2),
            ],
        ];

        foreach ($beritas as $berita) {
            Berita::create($berita);
        }
        
        $this->command->info('✅ Berhasil membuat 3 berita');
    }
}
