<?php

namespace App\Http\Filters;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter {

   const CATEGORIES = 'categories';
   const COLORS = 'colors';
   const PRICES = 'prices';
   const TAGS = 'tags';
   const SORTBY = 'sortby';
   const TITLE = 'title';
   const HIGHRATED = 'highRated';


   protected function getCallbacks(): array
   {
      return [
         self::CATEGORIES => [$this, 'categories'],
         self::COLORS => [$this, 'colors'],
         self::PRICES => [$this, 'prices'],
         self::TAGS => [$this, 'tags'],
         self::SORTBY => [$this, 'sortby'],
         self::TITLE => [$this, 'title'],
         self::HIGHRATED => [$this, 'highRated'],
      ];
   }

   protected function categories(Builder $builder, $values) {
      $builder->whereIn('category_id', $values);
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

   protected function title(Builder $builder, $value) {
      $builder->where('title', 'like', '%' . $value . '%');
   }

   protected function sortby(Builder $builder, $value) {
      switch ($value) {
         case 'bestseller':
            $builder->orderBy('count', 'desc');
            break;
         case 'sale':
            $builder->whereNotNull('old_price');
            break;
         case 'title(ASC)':
            $builder->orderBy('title', 'asc');
            break;
         case 'title(DESC)':
            $builder->orderBy('title', 'desc');
            break;
         case 'price(ASC)':
            $builder->orderBy('price', 'asc');
            break;
         case 'price(DESC)':
            $builder->orderBy('price', 'desc');
            break;
         default:
            $builder->orderBy('created_at', 'asc');
            break;
      }
   }

   protected function highRated(Builder $builder) {
      $builder->where(function ($query) {
         $query->selectRaw('COALESCE(AVG(rating), 0)')
               ->from('reviews')
               ->whereColumn('reviews.product_id', 'products.id');
      }, '>', 4);
  }
}