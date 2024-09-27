<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->nullable()->default("")->change();
            $table->string('patronymic')->nullable()->default("")->change();
            $table->string('address')->nullable()->default("")->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->nullable()->default(null)->change();
            $table->string('patronymic')->nullable()->default(null)->change();
            $table->string('address')->nullable()->default(null)->change();
        });
    }
};
