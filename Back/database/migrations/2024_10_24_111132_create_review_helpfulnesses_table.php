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
        Schema::create('review_helpfulnesses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->index()->constrained('users')->onDelete('cascade');
            $table->foreignId('review_id')->index()->constrained('reviews')->onDelete('cascade');

            $table->boolean('is_helpful');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_helpfulnesses');
    }
};
