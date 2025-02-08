<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Service\CategoryService;

class BaseController extends Controller
{
   public $service;

   public function __construct(CategoryService $service)
   {
      $this->service = $service;
   }
}
