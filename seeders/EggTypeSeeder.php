<?php

namespace Database\Seeders;

use App\Models\CreatureType;
use App\Models\EggType;
use App\Models\EggTypeDrop;
use Illuminate\Database\Seeder;

class EggTypeSeeder extends Seeder
{
    public function run(): void
    {
        // Common Egg
        $commonEgg = EggType::create([
            'name' => 'ไข่ธรรมดา', 'rarity' => 'Common',
            'hatch_time_hours' => 1, 'cost_coins' => 100, 'cost_gems' => 0,
            'description' => 'ไข่ธรรมดาที่มีโอกาสฟักออกมาเป็นสัตว์ Common-Rare',
        ]);

        // Rare Egg
        $rareEgg = EggType::create([
            'name' => 'ไข่หายาก', 'rarity' => 'Rare',
            'hatch_time_hours' => 4, 'cost_coins' => 500, 'cost_gems' => 0,
            'description' => 'ไข่หายากที่มีโอกาสฟักออกมาเป็นสัตว์ Rare ขึ้นไป',
        ]);

        // Epic Egg
        $epicEgg = EggType::create([
            'name' => 'ไข่มหากาพย์', 'rarity' => 'Epic',
            'hatch_time_hours' => 12, 'cost_coins' => 0, 'cost_gems' => 50,
            'description' => 'ไข่มหากาพย์ที่การันตี Epic ขึ้นไป',
        ]);

        // Legendary Egg
        $legendaryEgg = EggType::create([
            'name' => 'ไข่ตำนาน', 'rarity' => 'Legendary',
            'hatch_time_hours' => 24, 'cost_coins' => 0, 'cost_gems' => 200,
            'description' => 'ไข่ในตำนาน มีโอกาสได้สัตว์ Legendary!',
        ]);

        // Get creature IDs by rarity
        $commons = CreatureType::where('rarity', 'Common')->whereNull('evolution_from_id')->pluck('id');
        $rares = CreatureType::where('rarity', 'Rare')->whereNull('evolution_from_id')->pluck('id');
        $epics = CreatureType::where('rarity', 'Epic')->whereNull('evolution_from_id')->pluck('id');

        // ===== Drop Rates for Common Egg =====
        foreach ($commons as $id) {
            EggTypeDrop::create(['egg_type_id' => $commonEgg->id, 'creature_type_id' => $id, 'drop_rate' => 35]);
        }
        foreach ($rares as $id) {
            EggTypeDrop::create(['egg_type_id' => $commonEgg->id, 'creature_type_id' => $id, 'drop_rate' => 15]);
        }

        // ===== Drop Rates for Rare Egg =====
        foreach ($commons as $id) {
            EggTypeDrop::create(['egg_type_id' => $rareEgg->id, 'creature_type_id' => $id, 'drop_rate' => 15]);
        }
        foreach ($rares as $id) {
            EggTypeDrop::create(['egg_type_id' => $rareEgg->id, 'creature_type_id' => $id, 'drop_rate' => 25]);
        }
        foreach ($epics as $id) {
            EggTypeDrop::create(['egg_type_id' => $rareEgg->id, 'creature_type_id' => $id, 'drop_rate' => 5]);
        }

        // ===== Drop Rates for Epic Egg =====
        foreach ($rares as $id) {
            EggTypeDrop::create(['egg_type_id' => $epicEgg->id, 'creature_type_id' => $id, 'drop_rate' => 10]);
        }
        foreach ($epics as $id) {
            EggTypeDrop::create(['egg_type_id' => $epicEgg->id, 'creature_type_id' => $id, 'drop_rate' => 30]);
        }

        // ===== Drop Rates for Legendary Egg =====
        foreach ($rares as $id) {
            EggTypeDrop::create(['egg_type_id' => $legendaryEgg->id, 'creature_type_id' => $id, 'drop_rate' => 5]);
        }
        foreach ($epics as $id) {
            EggTypeDrop::create(['egg_type_id' => $legendaryEgg->id, 'creature_type_id' => $id, 'drop_rate' => 20]);
        }
        // Legendary creatures from evolution stage 3
        $legendaries = CreatureType::where('rarity', 'Legendary')->whereNotNull('evolution_from_id')->pluck('id');
        foreach ($legendaries as $id) {
            EggTypeDrop::create(['egg_type_id' => $legendaryEgg->id, 'creature_type_id' => $id, 'drop_rate' => 5]);
        }
    }
}
