<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCoupon extends Model
{
    protected $table = 'product_coupons';
    protected $fillable = [
        'product_id',
        'coupon_id'
    ];
}