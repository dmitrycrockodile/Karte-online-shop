<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'question',
        'message',
        'status'
    ];

    public function getDaysOldAttribute() {
        return Carbon::now()->diffInDays($this->created_at);
    }
}