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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->index()->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('product_id')->index()->constrained('products', 'id')->onDelete('cascade');
            $table->unsignedSmallInteger('rating')->check('rating >= 1 AND rating <= 5');
            $table->unsignedInteger('helpful_count')->default(0);
            $table->unsignedInteger('not_helpful_count')->default(0);
            $table->string('title', 100);
            $table->text('body')->nullable();
            $table->unique(['user_id', 'product_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
