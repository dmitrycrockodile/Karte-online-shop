<?php

namespace App\Enums;

enum QuestionStatus: int {
   case PENDING = 0;
   case IN_PROGRESS = 1;
   case RESOLVED = 2;

   public function text() {
      return match ($this) {
         self::PENDING => 'Pending',
         self::IN_PROGRESS => 'In Progress',
         self::RESOLVED => 'Resolved'
      };
   }
};