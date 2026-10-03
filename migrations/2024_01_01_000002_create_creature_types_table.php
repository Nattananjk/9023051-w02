<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('creature_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('element'); // fire, water, earth, wind, light, dark
            $table->integer('base_hp')->default(100);
            $table->integer('base_atk')->default(10);
            $table->integer('base_def')->default(10);
            $table->enum('rarity', ['Common', 'Rare', 'Epic', 'Legendary'])->default('Common');
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->foreignId('evolution_from_id')->nullable()->constrained('creature_types')->nullOnDelete();
            $table->integer('evolution_level')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('creature_types');
    }
};
