<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewHelpfulness extends Model
{
    protected $table = 'review_helpfulnesses';
    protected $guarded = false;

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function review() {
        return $this->belongsTo(Review::class, 'review_id', 'id');
    }
}
