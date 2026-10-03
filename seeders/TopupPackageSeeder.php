<?php

namespace Database\Seeders;

use App\Models\TopupPackage;
use Illuminate\Database\Seeder;

class TopupPackageSeeder extends Seeder
{
    public function run(): void
    {
        TopupPackage::create([
            'name' => 'Starter',
            'price_thb' => 29.00,
            'coins_amount' => 300,
            'gems_amount' => 0,
            'bonus_percent' => 0,
        ]);

        TopupPackage::create([
            'name' => 'Adventurer',
            'price_thb' => 99.00,
            'coins_amount' => 1100,
            'gems_amount' => 10,
            'bonus_percent' => 10,
        ]);

        TopupPackage::create([
            'name' => 'Hero',
            'price_thb' => 299.00,
            'coins_amount' => 3500,
            'gems_amount' => 50,
            'bonus_percent' => 17,
        ]);

        TopupPackage::create([
            'name' => 'Legend',
            'price_thb' => 999.00,
            'coins_amount' => 12000,
            'gems_amount' => 200,
            'bonus_percent' => 20,
        ]);
    }
}
