<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('egg_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('rarity', ['Common', 'Rare', 'Epic', 'Legendary'])->default('Common');
            $table->integer('hatch_time_hours')->default(1);
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->integer('cost_coins')->default(0);
            $table->integer('cost_gems')->default(0);
            $table->timestamps();
        });

        Schema::create('egg_type_drops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('egg_type_id')->constrained('egg_types')->cascadeOnDelete();
            $table->foreignId('creature_type_id')->constrained('creature_types')->cascadeOnDelete();
            $table->decimal('drop_rate', 5, 2)->default(0); // 0.00 - 100.00
            $table->timestamps();
        });

        Schema::create('player_eggs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('egg_type_id')->constrained('egg_types')->cascadeOnDelete();
            $table->timestamp('hatched_at')->nullable();
            $table->timestamp('hatch_ready_at')->nullable();
            $table->enum('status', ['owned', 'incubating', 'ready', 'hatched'])->default('owned');
            $table->foreignId('result_creature_id')->nullable()->constrained('player_creatures')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('player_eggs');
        Schema::dropIfExists('egg_type_drops');
        Schema::dropIfExists('egg_types');
    }
};
