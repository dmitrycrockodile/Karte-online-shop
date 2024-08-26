<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = false;

    public function coupons() {
        return $this->belongsToMany(Coupon::class, 'category_coupons', 'category_id', 'coupon_id');
    }

    public function getPreviewImageUrlAttribute() {
        if ($this->preview_image) {
            return url('storage/' . $this->preview_image);
        } else {
            return null;
        }
    }

    public function getBannerUrlAttribute() {
        if ($this->banner) {
            return url('storage/' . $this->banner);
        } else {
            return null;
        }
    }

    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
