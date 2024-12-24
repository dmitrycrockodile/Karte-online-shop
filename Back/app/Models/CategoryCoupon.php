<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryCoupon extends Model
{
    protected $table = 'category_coupons';
    protected $fillable = [
        'category_id',
        'coupon_id'
    ];
}