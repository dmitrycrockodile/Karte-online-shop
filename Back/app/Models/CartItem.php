<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_items';
    protected $fillable = [
        'product_id', 
        'user_id', 
        'quantity', 
        'attributes'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function category() {
        return $this->hasOne(Category::class, 'category_id', 'id');
    }
}
