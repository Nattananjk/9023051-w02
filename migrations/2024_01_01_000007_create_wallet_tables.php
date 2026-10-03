<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->integer('coins')->default(0);
            $table->integer('gems')->default(0);
            $table->timestamps();
        });

        Schema::create('topup_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price_thb', 10, 2);
            $table->integer('coins_amount')->default(0);
            $table->integer('gems_amount')->default(0);
            $table->integer('bonus_percent')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['topup', 'purchase', 'reward', 'sell', 'quest_reward']);
            $table->integer('amount');
            $table->enum('currency', ['coins', 'gems', 'real_money'])->default('coins');
            $table->string('description')->nullable();
            $table->string('reference_type')->nullable(); // item, egg, topup_package
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->enum('status', ['pending', 'completed', 'failed', 'refunded'])->default('completed');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('topup_packages');
        Schema::dropIfExists('wallets');
    }
};
