<?php

namespace App\Enums;

enum UserSubscriptionStatus: int {
   case NOT_SUBSCRIBED = 0;
   case SUBSCRIBED = 1;

   public function text() {
      return match ($this) {
         self::NOT_SUBSCRIBED => 'Not subscribed',
         self::SUBSCRIBED => 'Subscribed'
      };
   }
}