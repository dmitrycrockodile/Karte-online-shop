<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Coupon\CouponResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'coupons' => CouponResource::collection($this->coupons),
            'preview_image' => $this->previewImageUrl,
            'banner' => $this->bannerUrl,
            'products_count' => count($this->products),
        ];
    }
}
