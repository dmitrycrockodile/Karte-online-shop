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
        Schema::create('color_products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('color_id')->nullable()->index()->constrained('colors', 'id')->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->index()->constrained('products', 'id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_products');
    }
};
