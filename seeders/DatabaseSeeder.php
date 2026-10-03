<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. Seed master data
        $this->call([
            CreatureTypeSeeder::class,
            ItemSeeder::class,
            EggTypeSeeder::class,
            TopupPackageSeeder::class,
        ]);

        // 2. Create a test user
        $user = User::create([
            'name' => 'TestPlayer',
            'username' => 'testplayer',
            'email' => 'test@savequest.com',
            'password' => Hash::make('password123'),
            'display_name' => 'นักผจญภัยทดสอบ',
            'level' => 5,
            'exp' => 70,
            'total_savings' => 12450,
        ]);

        // Create wallet for test user
        Wallet::create([
            'user_id' => $user->id,
            'coins' => 5000,
            'gems' => 50,
        ]);
    }
}
