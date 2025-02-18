<?php

namespace App\Enums;

enum ProductStatus: int {
   case DRAFT = 0;
   case PUBLISHED = 1;

   public function text() {
      return match ($this) {
         self::DRAFT => 'Draft',
         self::PUBLISHED => 'Published'
      };
   }
}