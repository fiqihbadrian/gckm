<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Denah;

class DenahSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama
        Denah::truncate();
        
        // Buat 4 denah blok
        $denahs = [
            [
                'blok' => 'A',
                'name' => 'Blok Melati',
                'description' => 'Blok A terletak di bagian depan perumahan, dekat dengan gerbang utama dan area parkir.',
                'image' => null,
                'total_units' => 15,
                'is_active' => true,
            ],
            [
                'blok' => 'B',
                'name' => 'Blok Anggrek',
                'description' => 'Blok B berada di area tengah dengan akses mudah ke taman bermain dan masjid.',
                'image' => null,
                'total_units' => 15,
                'is_active' => true,
            ],
            [
                'blok' => 'C',
                'name' => 'Blok Mawar',
                'description' => 'Blok C terletak di sisi timur perumahan, dekat dengan area olahraga dan kolam renang.',
                'image' => null,
                'total_units' => 15,
                'is_active' => true,
            ],
            [
                'blok' => 'D',
                'name' => 'Blok Kenanga',
                'description' => 'Blok D berada di bagian belakang yang tenang, cocok untuk yang menginginkan suasana privat.',
                'image' => null,
                'total_units' => 15,
                'is_active' => true,
            ],
        ];

        foreach ($denahs as $denah) {
            Denah::create($denah);
        }
        
        $this->command->info('✅ Berhasil membuat 4 denah blok (A, B, C, D)');
    }
}
