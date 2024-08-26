<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';
    protected $guarded = false;

    public function getImageUrlAttribute() {
        if ($this->file_path) {
            return url('storage/' . $this->file_path);
        } else {
            return null;
        }
    }
}
