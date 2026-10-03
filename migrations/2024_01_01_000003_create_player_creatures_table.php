<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('player_creatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('creature_type_id')->constrained('creature_types')->cascadeOnDelete();
            $table->string('nickname', 30)->nullable();
            $table->integer('level')->default(1);
            $table->integer('exp')->default(0);
            $table->integer('current_hp');
            $table->integer('current_atk');
            $table->integer('current_def');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('player_creatures');
    }
};
