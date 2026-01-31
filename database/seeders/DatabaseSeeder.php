<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed all data
        $this->call([
            AdminSeeder::class,
            RumahSeeder::class,
            BeritaSeeder::class,
            DenahSeeder::class,
        ]);
    }
}
