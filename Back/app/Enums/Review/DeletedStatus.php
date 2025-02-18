<?php

namespace App\Enums\Review;

enum DeletedStatus: int {
   case ACTIVE = 0;
   case DELETED = 1;

   public function text() {
      return match ($this) {
         self::ACTIVE => 'Active',
         self::DELETED => 'Deleted'
      };
   }
};