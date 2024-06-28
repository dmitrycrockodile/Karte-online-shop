<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Service\ProductService;

class BaseController extends Controller
{
   public $service;

   public function __construct(ProductService $service)
   {
      $this->service = $service;
   }
}
