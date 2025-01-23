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
        Schema::drop('orders');

        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->index()->constrained('users');
            $table->string('status');
            $table->decimal('total_price', 6, 2);
            $table->string('session_id');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('orders');

        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->index()->constrained('users');
            $table->jsonb('products');
            $table->decimal('total_price');
            $table->unsignedSmallInteger('payment_status')->default(1);

            $table->timestamps();
        });
    }
};
