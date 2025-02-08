<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class CategoryService {
   /**
    * Method tries to store the data into the categories table
    *
    * @param Array $data
    * @return bool
   */
   public function store(Array $data): bool {
      try {
         DB::beginTransaction();

         // Check if the images exist
         if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images/categories', $data['preview_image']);
         }
         if (isset($data['banner'])) {
            $data['banner'] = Storage::disk('public')->put('/images/categories', $data['banner']);
         }
         
         // Extracting and remowing 'coupons' from data
         $couponsIds = $data['coupons'] ?? [];
         unset($data['coupons']);
         
         // Create or update the category
         $category = Category::firstOrCreate($data);
         
         // Attaching the coupons based on extracted ids
         $category->coupons()->attach($couponsIds);

         DB::commit();

         return true;
      } catch (\Exception $e) {
         DB::rollBack();

         Log::error("CategoryService Store Error: " . $e->getMessage(), [
            'trace' => $e->getTraceAsString()
         ]);
         
         return false;
      }
   }

   /**
    * Method tries to update the category data in the categories table
    *
    * @param Array $data
    * @param Category $category
    * @return bool
   */
   public function update(Array $data, Category $category): bool {
      try {
         DB::beginTransaction();

         // Check if the images exist
         if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images/categories', $data['preview_image']);
         } else {
            $data['preview_image'] = $category['preview_image'];
         }
         if (isset($data['banner'])) {
            $data['banner'] = Storage::disk('public')->put('/images/categories', $data['banner']);
         } else {
            $data['banner'] = $category['banner'];
         }

        // Extracting and remowing 'coupons' from data
        $couponsIds = $data['coupons'] ?? [];
        unset($data['coupons']);

        $category->update($data);

        // Sync the coupons based on extracted ids
        $category->coupons()->sync($couponsIds);

        DB::commit();

        return true;
      } catch (\Exception $e) {
         DB::rollBack();

         Log::error("CategoryService Store Error: " . $e->getMessage(), [
            'trace' => $e->getTraceAsString()
         ]);
         
         return false;
      }
   }
}