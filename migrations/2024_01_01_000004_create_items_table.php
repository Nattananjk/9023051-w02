<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['weapon', 'armor', 'consumable', 'material', 'special'])->default('consumable');
            $table->enum('rarity', ['Common', 'Rare', 'Epic', 'Legendary'])->default('Common');
            $table->integer('atk')->default(0);
            $table->integer('def')->default(0);
            $table->integer('hp_boost')->default(0);
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('is_tradable')->default(true);
            $table->integer('sell_price')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
