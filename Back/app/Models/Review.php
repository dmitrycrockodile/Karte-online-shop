<?php

namespace App\Models;

use App\Enums\Review\DeletedStatus;
use App\Enums\Review\ReportStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'title',
        'body',
        'reported',
        'deleted'
    ];
    protected $casts = [
        'reported' => ReportStatus::class,
        'deleted' => DeletedStatus::class,
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function helpfulness() {
        return $this->hasMany(ReviewHelpfulness::class, 'review_id', 'id');
    }

    public function getHelpfulCountAttribute() {
        return $this->helpfulness()->where('is_helpful', true)->count();
    }

    public function getNotHelpfulCountAttribute() {
        return $this->helpfulness()->where('is_helpful', false)->count();
    }

    public function getDaysOldAttribute() {
        return Carbon::now()->diffInDays($this->created_at);
    }
}
