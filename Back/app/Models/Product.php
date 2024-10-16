<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Filterable;

    protected $table = 'products';
    protected $guarded = false;

    public function tags() {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function sizes() {
        return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'size_id');
    }

    public function coupons() {
        return $this->belongsToMany(Coupon::class, 'product_coupons', 'product_id', 'coupon_id');
    }

    public function colors() {
        return $this->belongsToMany(Color::class, 'color_products', 'product_id', 'color_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function images() {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function getPreviewImageUrlAttribute() {
        if ($this->preview_image) {
            return url('storage/' . $this->preview_image);
        } else {
            return null;
        }
    }
}
