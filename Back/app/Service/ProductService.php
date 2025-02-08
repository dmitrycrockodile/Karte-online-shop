<?php

namespace App\Service;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Log;

class ProductService {
   /**
    * Method tries to store the data into the products table
    *
    * @param Array $data
    * @return bool
   */
   public function store(Array $data): bool {
      try {
         DB::beginTransaction();
         
         // Storing the preview image
         $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
 
          // Set the is_published value
         $data['is_published'] = isset($data['is_published']) ? true : false;

         // Extracting and remowing 'tags' from data
         $tagsIds = $data['tags'] ?? [];
         unset($data['tags']);

         // Extracting and remowing 'sizes' from data
         $sizesIds = $data['sizes'] ?? [];
         unset($data['sizes']);

         // Extracting and remowing 'coupons' from data
         $couponsIds = $data['coupons'] ?? [];
         unset($data['coupons']);

         // Extracting and remowing 'colors' from data
         $colorsIds = $data['colors'] ?? [];
         unset($data['colors']);

         // Check if the images exist and set to the product
         if (isset($data['images'])) {
            $images = $data['images'];
            unset($data['images']);

            $product = Product::firstOrCreate([
               'title' => $data['title'],
            ], $data);

            foreach ($images as $image) {
               if (count($images) > 3) break;

               $filepath = Storage::disk('public')->put('/images', $image);

               ProductImage::create([
                  'product_id' => $product->id,
                  'file_path' => $filepath,
               ]);
            }

         } else {
            $images = [];

            $product = Product::firstOrCreate([
               'title' => $data['title'],
            ], $data);
         }

         // Attach the data based on extracted ids
         $product->tags()->attach($tagsIds);
         $product->sizes()->attach($sizesIds);
         $product->colors()->attach($colorsIds);
         $product->coupons()->attach($couponsIds);

         DB::commit();

         return true;
      } catch (\Exception $exception) {
         DB::rollBack();
         
         Log::error("ProductService Store Error: " . $exception->getMessage(), [
            'trace' => $exception->getTraceAsString()
         ]);

         return false;
     }
   } 

   /**
    * Method tries to update the product data in the products table
    *
    * @param Array $data
    * @param Product $product
    * @return bool
   */
   public function update(Array $data, Product $product): bool {
      try {
         DB::beginTransaction();

          // Check if the preview image exist
         if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
         } else {
            $data['preview_image'] = $product['preview_image'];
         }

         // Set the is_published value
         $data['is_published'] = isset($data['is_published']) ? true : false;

         // Extracting and remowing 'tags' from data
         $tagsIds = $data['tags'] ?? [];
         unset($data['tags']);

         // Extracting and remowing 'sizes' from data
         $sizesIds = $data['sizes'] ?? [];
         unset($data['sizes']);

         // Extracting and remowing 'coupons' from data
         $couponsIds = $data['coupons'] ?? [];
         unset($data['coupons']);

         // Extracting and remowing 'colors' from data
         $colorsIds = $data['colors'] ?? [];
         unset($data['colors']);

         $product->update($data);

         // Sync the data based on extracted ids
         $product->tags()->sync($tagsIds);
         $product->sizes()->sync($sizesIds);
         $product->colors()->sync($colorsIds);
         $product->coupons()->sync($couponsIds);

         DB::commit();

         return true;
      } catch (\Exception $exception) {
         DB::rollBack();
         
         Log::error("ProductService Update Error: " . $exception->getMessage(), [
            'trace' => $exception->getTraceAsString()
         ]);

         return false;
      }
   }
}