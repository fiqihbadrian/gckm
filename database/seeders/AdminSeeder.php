<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Check if admin already exists
        if (!User::where('email', 'admin@perumahan.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@perumahan.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);
            
            $this->command->info('✅ Admin user created');
        } else {
            $this->command->info('ℹ️  Admin user already exists');
        }
    }
}
