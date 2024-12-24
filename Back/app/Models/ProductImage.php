<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';
    protected $fillable = [
        'file_path',
        'product_id'
    ];

    public function getImageUrlAttribute() {
        if ($this->file_path) {
            return url('storage/' . $this->file_path);
        } else {
            return null;
        }
    }
}
