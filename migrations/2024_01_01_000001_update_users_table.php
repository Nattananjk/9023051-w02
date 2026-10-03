<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 20)->unique()->after('id');
            $table->string('display_name', 30)->nullable()->after('email');
            $table->integer('level')->default(1)->after('display_name');
            $table->integer('exp')->default(0)->after('level');
            $table->string('avatar_url')->nullable()->after('exp');
            $table->decimal('total_savings', 12, 2)->default(0)->after('avatar_url');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'display_name', 'level', 'exp', 'avatar_url', 'total_savings']);
        });
    }
};
