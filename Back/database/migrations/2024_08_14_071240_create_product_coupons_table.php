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
        Schema::create('product_coupons', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->index()->nullable()->constrained('products', 'id')->onDelete('cascade');
            $table->foreignId('coupon_id')->index()->nullable()->constrained('coupons', 'id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_coupons');
    }
};