<?php

namespace App\Service;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductImage;

class ProductService {

   public function store($data) {
      try {
         DB::beginTransaction();
         
         $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
 
         if (!isset($data['is_published'])) {
            $data['is_published'] = false;
         } else {
            $data['is_published'] = true;
         }

         if (isset($data['tags'])) {
            $tagsIds = $data['tags'];
            unset($data['tags']);
         } else {
            $tagsIds = [];
         }

         if (isset($data['sizes'])) {
            $sizesIds = $data['sizes'];
            unset($data['sizes']);
         } else {
            $sizesIds = [];
         }

         if (isset($data['colors'])) {
            $colorsIds = $data['colors'];
            unset($data['colors']);
         } else {
            $colorsIds = [];
         }

         if (isset($data['coupons'])) {
            $couponsIds = $data['coupons'];
            unset($data['coupons']);
         } else {
            $couponsIds = [];
         }

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

         $product->tags()->attach($tagsIds);
         $product->sizes()->attach($sizesIds);
         $product->colors()->attach($colorsIds);
         $product->coupons()->attach($couponsIds);
         
         DB::commit();
     } catch (\Exception $exception) {
         DB::rollBack();
         dd($exception);
         abort(500);
     }
   } 

   public function update($data, $product) {
      try {
         DB::beginTransaction();

         if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
         } else {
            $data['preview_image'] = $product['preview_image'];
         }

         if (!isset($data['is_published'])) {
            $data['is_published'] = false;
         } else {
            $data['is_published'] = true;
         }

         if (isset($data['tags'])) {
            $tagsIds = $data['tags'];
            unset($data['tags']);
         } else {
            $tagsIds = [];
         }

         if (isset($data['sizes'])) {
            $sizesIds = $data['sizes'];
            unset($data['sizes']);
         } else {
            $sizesIds = [];
         }

         if (isset($data['coupons'])) {
            $couponsIds = $data['coupons'];
            unset($data['coupons']);
         } else {
            $couponsIds = [];
         }

         if (isset($data['colors'])) {
            $colorsIds = $data['colors'];
            unset($data['colors']);
         } else {
            $colorsIds = [];
         }

         $product->update($data);
         $product->tags()->sync($tagsIds);
         $product->sizes()->sync($sizesIds);
         $product->colors()->sync($colorsIds);
         $product->coupons()->sync($couponsIds);


         DB::commit();
      } catch (\Exception $exception) {
         DB::rollBack();
         dd($exception);
         abort(500);
      }
   }
}