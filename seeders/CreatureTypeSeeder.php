<?php

namespace Database\Seeders;

use App\Models\CreatureType;
use Illuminate\Database\Seeder;

class CreatureTypeSeeder extends Seeder
{
    public function run(): void
    {
        // ===== Base Creatures (Stage 1) =====
        $babyDragon = CreatureType::create([
            'name' => 'ลูกมังกรไฟ',
            'element' => 'fire',
            'base_hp' => 80, 'base_atk' => 15, 'base_def' => 10,
            'rarity' => 'Rare',
            'description' => 'ลูกมังกรน้อยที่เกิดจากเปลวไฟแห่งการออม มีพลังไฟอันร้อนแรง',
        ]);

        $icebird = CreatureType::create([
            'name' => 'นกน้ำแข็ง',
            'element' => 'water',
            'base_hp' => 70, 'base_atk' => 12, 'base_def' => 8,
            'rarity' => 'Common',
            'description' => 'นกน้อยที่มีปีกเป็นน้ำแข็ง สง่างามและเย็นชา',
        ]);

        $golem = CreatureType::create([
            'name' => 'โกเลมหิน',
            'element' => 'earth',
            'base_hp' => 120, 'base_atk' => 8, 'base_def' => 20,
            'rarity' => 'Epic',
            'description' => 'ยักษ์หินที่ตื่นจากการสะสมเหรียญทองนับพัน แข็งแกร่งเหลือเชื่อ',
        ]);

        $thunderWolf = CreatureType::create([
            'name' => 'หมาป่าสายฟ้า',
            'element' => 'wind',
            'base_hp' => 85, 'base_atk' => 18, 'base_def' => 9,
            'rarity' => 'Rare',
            'description' => 'หมาป่าที่วิ่งเร็วดั่งสายฟ้า ร่างกายส่งประกายไฟฟ้า',
        ]);

        $shadowCat = CreatureType::create([
            'name' => 'แมวเงา',
            'element' => 'dark',
            'base_hp' => 75, 'base_atk' => 16, 'base_def' => 11,
            'rarity' => 'Epic',
            'description' => 'แมวดำลึกลับที่ซ่อนตัวในเงามืด ออกล่าในยามค่ำคืน',
        ]);

        $lightRabbit = CreatureType::create([
            'name' => 'กระต่ายแสง',
            'element' => 'light',
            'base_hp' => 65, 'base_atk' => 10, 'base_def' => 7,
            'rarity' => 'Common',
            'description' => 'กระต่ายน่ารักที่ร่างกายเรืองแสง ให้พลังบวกแก่ทุกคนรอบข้าง',
        ]);

        // ===== Evolution Stage 2 =====
        CreatureType::create([
            'name' => 'มังกรไฟ',
            'element' => 'fire',
            'base_hp' => 150, 'base_atk' => 30, 'base_def' => 20,
            'rarity' => 'Epic',
            'description' => 'มังกรไฟที่เติบโตเต็มวัย มีลมหายใจเป็นเปลวเพลิง',
            'evolution_from_id' => $babyDragon->id,
            'evolution_level' => 15,
        ]);

        CreatureType::create([
            'name' => 'เหยี่ยวน้ำแข็ง',
            'element' => 'water',
            'base_hp' => 120, 'base_atk' => 25, 'base_def' => 15,
            'rarity' => 'Rare',
            'description' => 'เหยี่ยวที่ปีกแข็งดั่งน้ำแข็ง โบยบินอย่างองอาจ',
            'evolution_from_id' => $icebird->id,
            'evolution_level' => 10,
        ]);

        CreatureType::create([
            'name' => 'ไททันหิน',
            'element' => 'earth',
            'base_hp' => 200, 'base_atk' => 15, 'base_def' => 40,
            'rarity' => 'Legendary',
            'description' => 'ยักษ์หินขนาดมหึมา มีพลังป้องกันสูงสุดในบรรดาสัตว์ทั้งหมด',
            'evolution_from_id' => $golem->id,
            'evolution_level' => 20,
        ]);

        CreatureType::create([
            'name' => 'ซีรูส์',
            'element' => 'wind',
            'base_hp' => 140, 'base_atk' => 35, 'base_def' => 18,
            'rarity' => 'Epic',
            'description' => 'หมาป่าสายฟ้าที่วิวัฒนาการ มีความเร็วเหนือแสง',
            'evolution_from_id' => $thunderWolf->id,
            'evolution_level' => 15,
        ]);

        $blackPanther = CreatureType::create([
            'name' => 'เสือดำ',
            'element' => 'dark',
            'base_hp' => 130, 'base_atk' => 32, 'base_def' => 22,
            'rarity' => 'Epic',
            'description' => 'เสือดำนักล่าที่ไร้เสียง ศัตรูไม่มีวันรู้ว่ามันอยู่ที่ไหน',
            'evolution_from_id' => $shadowCat->id,
            'evolution_level' => 15,
        ]);

        CreatureType::create([
            'name' => 'ยูนิคอร์น',
            'element' => 'light',
            'base_hp' => 110, 'base_atk' => 22, 'base_def' => 16,
            'rarity' => 'Rare',
            'description' => 'ม้ายูนิคอร์นแห่งแสง มีพลังรักษาและปกป้อง',
            'evolution_from_id' => $lightRabbit->id,
            'evolution_level' => 10,
        ]);

        // ===== Evolution Stage 3 (Final) =====
        CreatureType::create([
            'name' => 'จักรพรรดิมังกร',
            'element' => 'fire',
            'base_hp' => 250, 'base_atk' => 50, 'base_def' => 35,
            'rarity' => 'Legendary',
            'description' => 'จักรพรรดิแห่งมังกร ราชาแห่งเปลวเพลิง มีพลังทำลายล้างสูงสุด',
            'evolution_from_id' => CreatureType::where('name', 'มังกรไฟ')->first()->id,
            'evolution_level' => 30,
        ]);

        CreatureType::create([
            'name' => 'แพนเธอร์',
            'element' => 'dark',
            'base_hp' => 200, 'base_atk' => 48, 'base_def' => 30,
            'rarity' => 'Legendary',
            'description' => 'เจ้าแห่งความมืด แพนเธอร์ในตำนาน ผู้ที่เห็นมันมักจะเป็นคนสุดท้าย',
            'evolution_from_id' => $blackPanther->id,
            'evolution_level' => 30,
        ]);
    }
}
