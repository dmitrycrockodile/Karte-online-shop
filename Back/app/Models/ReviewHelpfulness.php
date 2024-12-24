<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewHelpfulness extends Model
{
    protected $table = 'review_helpfulnesses';
    protected $fillable = [
        'user_id',
        'review_id',
        'is_helpful'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function review() {
        return $this->belongsTo(Review::class, 'review_id', 'id');
    }
}
