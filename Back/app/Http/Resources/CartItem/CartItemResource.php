<?php

namespace App\Http\Resources\CartItem;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Size\SizeResource;
use App\Http\Resources\Color\ColorResource;
use App\Http\Resources\Coupon\CouponResource;

class CartItemResource extends JsonResource
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
            'product_id' => $this->product->id,
            'color' => json_decode($this->attributes)->color,
            'size' => json_decode($this->attributes)->size,
            'quantity' => $this->quantity,
            'amount' => $this->product->count, 
            'title' => $this->product->title,
            'image' => $this->product->previewImageUrl,
            'price' => $this->product->price,
            'old_price' => $this->product->old_price,
            'coupons' => CouponResource::collection($this->product->coupons),
        ];
    }
}
