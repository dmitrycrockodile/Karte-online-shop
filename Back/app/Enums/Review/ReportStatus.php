<?php

namespace App\Enums\Review;

enum ReportStatus: int {
   case NOT_REPORTED = 0;
   case REPORTED = 1;

   public function text() {
      return match ($this) {
         self::NOT_REPORTED => 'No reports',
         self::REPORTED => 'Reported',
      };
   }
};