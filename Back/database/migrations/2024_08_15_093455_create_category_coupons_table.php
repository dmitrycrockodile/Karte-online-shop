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
        Schema::create('category_coupons', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')->nullable()->index()->constrained('categories', 'id')->onDelete('cascade');
            $table->foreignId('coupon_id')->index()->nullable()->constrained('coupons', 'id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_coupons');
    }
};
