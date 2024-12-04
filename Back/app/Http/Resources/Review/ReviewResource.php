<?php

namespace App\Http\Resources\Review;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'user_id' => $this->user_id,
            'username' => "{$this->user->name} {$this->user->surname}",
            'product_id' => $this->product_id,
            'rating' => $this->rating,
            'helpful_count' => $this->helpfulCount,
            'not_helpful_count' => $this->notHelpfulCount,
            'body' => $this->body,
            'date' => Carbon::parse($this->created_at)->format('F j, Y'),
            'reported' => $this->reported || false,
        ];
    }
}
