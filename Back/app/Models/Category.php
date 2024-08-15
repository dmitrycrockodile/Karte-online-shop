<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = false;

    public function coupons() {
        return $this->belongsToMany(Coupon::class, 'category_coupons', 'category_id', 'coupon_id');
    }
}
