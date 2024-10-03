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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();

            $table->string('name', '20');
            $table->string('phone_number', 15)->nullable();
            $table->string('email');
            $table->string('question', 100);
            $table->string('message')->nullable();
            $table->string('status')->default('open');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
        Schema::dropIfExists('supports');
    }
};
