<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $foreignKeyExists = DB::select("SELECT CONSTRAINT_NAME 
                FROM information_schema.KEY_COLUMN_USAGE 
                WHERE TABLE_NAME = 'reviews' 
                AND COLUMN_NAME = 'product_id'
                AND CONSTRAINT_NAME = 'reviews_product_id_foreign'");
            
            if (!empty($foreignKeyExists)) {
                $table->dropForeign(['product_id']);
            }

            if (Schema::hasColumn('reviews', 'product_id')) {
                $table->dropColumn('product_id');
            }

            if (!Schema::hasColumn('reviews', 'reviewable_type') && !Schema::hasColumn('reviews', 'reviewable_id')) {
                $table->morphs('reviewable');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            if (!Schema::hasColumn('reviews', 'product_id')) {
                $table->foreignId('product_id')->index()->constrained('products', 'id')->onDelete('cascade');
            }

            if (Schema::hasColumn('reviews', 'reviewable_type') && Schema::hasColumn('reviews', 'reviewable_id')) {
                $indexExists = DB::select("SHOW INDEX FROM reviews WHERE Key_name = 'reviews_reviewable_type_reviewable_id_index'");
                if (!empty($indexExists)) {
                    $table->dropIndex('reviews_reviewable_type_reviewable_id_index');
                }

                $table->dropColumn(['reviewable_type', 'reviewable_id']);
            }
        });
    }
};
