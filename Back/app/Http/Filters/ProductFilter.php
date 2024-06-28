<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter {

   const CATEGORIES = 'categories';
   const COLORS = 'colors';
   const PRICES = 'prices';
   const TAGS = 'tags';


   protected function getCallbacks(): array
   {
      return [
         self::CATEGORIES => [$this, 'categories'],
         self::COLORS => [$this, 'colors'],
         self::PRICES => [$this, 'prices'],
         self::TAGS => [$this, 'tags'],
      ];
   }

   protected function categories(Builder $builder, $value) {
      $builder->whereIn('category_id', $value);
   }

   protected function colors(Builder $builder, $value) {
      $builder->whereHas('colors', function($b) use ($value) {
         $b->whereIn('color_id', $value);
      });
   }

   protected function prices(Builder $builder, $value) {
      $builder->whereBetween('price', $value);
   }

   protected function tags(Builder $builder, $value) {
      $builder->whereHas('tags', function($b) use ($value) {
         $b->whereIn('title', $value);
      });
   }
}