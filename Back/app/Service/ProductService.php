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

         if (isset($data['colors'])) {
            $colorsIds = $data['colors'];
            unset($data['colors']);
         } else {
            $colorsIds = [];
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
         $product->colors()->attach($colorsIds);
         
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

         if (isset($data['colors'])) {
            $colorsIds = $data['colors'];
            unset($data['colors']);
         } else {
            $colorsIds = [];
         }

         $product->update($data);
         $product->tags()->sync($tagsIds);
         $product->colors()->sync($colorsIds);

         DB::commit();
      } catch (\Exception $exception) {
         DB::rollBack();
         dd($exception);
         abort(500);
      }
   }
}