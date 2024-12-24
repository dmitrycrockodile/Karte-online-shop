<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    protected $table = 'product_tags';
    protected $fillable = [
        'product_id',
        'tag_id'
    ];
}
