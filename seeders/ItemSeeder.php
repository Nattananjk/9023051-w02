<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        // ===== Weapons =====
        Item::create([
            'name' => 'ดาบออมทอง', 'type' => 'weapon', 'rarity' => 'Legendary',
            'atk' => 120, 'sell_price' => 5000,
            'description' => 'ดาบศักดิ์สิทธิ์ที่ได้จากการออมครบ 10,000 บาท',
        ]);
        Item::create([
            'name' => 'คทาแห่งปัญญา', 'type' => 'weapon', 'rarity' => 'Epic',
            'atk' => 85, 'sell_price' => 3000,
            'description' => 'คทาที่เพิ่มพลังจากการทำเควสรายเดือน',
        ]);
        Item::create([
            'name' => 'ธนูเงินออม', 'type' => 'weapon', 'rarity' => 'Rare',
            'atk' => 65, 'sell_price' => 1500,
            'description' => 'ธนูที่ได้จากการออมติดต่อกัน 7 วัน',
        ]);
        Item::create([
            'name' => 'มีดสั้นเริ่มต้น', 'type' => 'weapon', 'rarity' => 'Common',
            'atk' => 25, 'sell_price' => 100,
            'description' => 'อาวุธเริ่มต้นของนักผจญภัย',
        ]);

        // ===== Armor =====
        Item::create([
            'name' => 'เกราะเพชรออม', 'type' => 'armor', 'rarity' => 'Legendary',
            'def' => 100, 'sell_price' => 4500,
            'description' => 'เกราะที่แข็งแกร่งที่สุด สร้างจากเพชรแห่งการออม',
        ]);
        Item::create([
            'name' => 'ชุดเกราะเหล็ก', 'type' => 'armor', 'rarity' => 'Rare',
            'def' => 50, 'sell_price' => 1200,
            'description' => 'เกราะเหล็กทนทาน ป้องกันการโจมตีได้ดี',
        ]);
        Item::create([
            'name' => 'เสื้อผ้าเริ่มต้น', 'type' => 'armor', 'rarity' => 'Common',
            'def' => 10, 'sell_price' => 50,
            'description' => 'เสื้อผ้าธรรมดาของนักผจญภัย',
        ]);

        // ===== Consumables =====
        Item::create([
            'name' => 'ยาเพิ่มพลัง', 'type' => 'consumable', 'rarity' => 'Common',
            'hp_boost' => 50, 'sell_price' => 30,
            'description' => 'ยาที่ช่วยฟื้นฟูพลังชีวิต 50 HP',
        ]);
        Item::create([
            'name' => 'ยาเพิ่มพลังชั้นสูง', 'type' => 'consumable', 'rarity' => 'Rare',
            'hp_boost' => 150, 'sell_price' => 100,
            'description' => 'ยาชั้นสูงที่ฟื้นฟูพลังชีวิต 150 HP',
        ]);

        // ===== Special Items =====
        Item::create([
            'name' => 'ม้วนเควส', 'type' => 'special', 'rarity' => 'Rare',
            'sell_price' => 200, 'is_tradable' => false,
            'description' => 'ม้วนกระดาษที่ปลดล็อกเควสพิเศษ',
        ]);
        Item::create([
            'name' => 'กล่องสมบัติ', 'type' => 'special', 'rarity' => 'Epic',
            'sell_price' => 500, 'is_tradable' => false,
            'description' => 'กล่องสมบัติลึกลับ สุ่มรับไอเทมหายาก',
        ]);
        Item::create([
            'name' => 'คริสตัล EXP', 'type' => 'special', 'rarity' => 'Epic',
            'sell_price' => 300, 'is_tradable' => false,
            'description' => 'คริสตัลที่ให้ EXP x2 เป็นเวลา 1 ชั่วโมง',
        ]);
    }
}
