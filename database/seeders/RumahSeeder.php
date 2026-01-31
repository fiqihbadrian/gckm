<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rumah;

class RumahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama
        Rumah::truncate();
        
        // Nama-nama Indonesia untuk random
        $namaDepan = ['Budi', 'Siti', 'Agus', 'Dewi', 'Rudi', 'Ani', 'Eko', 'Sri', 'Joko', 'Rina', 
                      'Bambang', 'Lina', 'Hadi', 'Wati', 'Ahmad', 'Ratna', 'Yudi', 'Sari', 'Dedi', 'Maya'];
        $namaBelakang = ['Santoso', 'Wijaya', 'Pratama', 'Kusuma', 'Setiawan', 'Putri', 'Nugroho', 
                         'Handoko', 'Susanto', 'Wulandari', 'Permana', 'Lestari', 'Saputra', 'Rahayu'];
        
        // 4 Blok: A, B, C, D
        $bloks = ['A', 'B', 'C', 'D'];
        
        foreach ($bloks as $blok) {
            // Tiap blok 15 rumah (nomor 1-15)
            for ($nomor = 1; $nomor <= 15; $nomor++) {
                // Random status: 70% terisi, 30% kosong
                $status = rand(1, 10) <= 7 ? 'terisi' : 'kosong';
                
                $data = [
                    'blok' => $blok,
                    'nomor' => $nomor,
                    'status' => $status,
                ];
                
                // Jika terisi, tambahkan data penghuni
                if ($status === 'terisi') {
                    $namaLengkap = $namaDepan[array_rand($namaDepan)] . ' ' . $namaBelakang[array_rand($namaBelakang)];
                    
                    $data['penghuni'] = $namaLengkap;
                    $data['no_telp'] = '08' . rand(1, 9) . rand(100000000, 999999999);
                    $data['email'] = strtolower(str_replace(' ', '.', $namaLengkap)) . '@email.com';
                    $data['jumlah_penghuni'] = rand(2, 6);
                    
                    // Random keterangan (50% punya keterangan)
                    if (rand(1, 2) == 1) {
                        $keteranganList = [
                            'Keluarga harmonis',
                            'Rumah bersih dan terawat',
                            'Punya anjing peliharaan',
                            'Suka berkebun',
                            'Aktif di kegiatan RT',
                            'Sering keluar kota',
                            'Punya usaha rumahan',
                            'Guru SD setempat',
                            'Pegawai swasta',
                            'Pensiunan',
                        ];
                        $data['keterangan'] = $keteranganList[array_rand($keteranganList)];
                    }
                } else {
                    // Rumah kosong
                    $data['penghuni'] = null;
                    $data['no_telp'] = null;
                    $data['email'] = null;
                    $data['jumlah_penghuni'] = 0;
                    $data['keterangan'] = rand(1, 3) == 1 ? 'Sedang direnovasi' : null;
                }
                
                Rumah::create($data);
            }
        }
        
        $this->command->info('✅ Berhasil generate 60 rumah (4 blok × 15 rumah)');
        $this->command->info('📊 Status: Random (±70% terisi, ±30% kosong)');
    }
}
