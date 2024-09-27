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
            $table->string('postal_code', 10)->nullable()->default("");
            $table->string('city', 100)->nullable()->default("");
            $table->string('country', 100)->nullable()->default("");
            $table->date('date_of_birth')->nullable();
            $table->unsignedInteger('phone_number')->nullable();
            $table->string('phone_number_country', 10)->nullable()->default("");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('postal_code');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('phone_number');
            $table->dropColumn('phone_number_country');
        });
    }
};
