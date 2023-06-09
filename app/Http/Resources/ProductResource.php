<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'discount' => $this->discount,
            'actual_price' => $this->getActualPrice($this->price, $this->discount),
            'attachment_1' => $this->attachment_1,
            'attachment_2' => $this->attachment_2,
            'attachment_3' => $this->attachment_3,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'reviews' => $this->reviews,
            'average_review' => $this->getAvgReview($this->reviews)
        ];
    }

    /**
     * @param $reviews
     * @return float|int|null
     */
    public function getAvgReview($reviews)
    {
        if(empty($reviews)) {
            return 0;
        }

        return ceil(collect($reviews)->pluck('stars')->avg());
    }

    public function getActualPrice($price, $discount)
    {
        if((int)$discount <= 0) {
            return $price;
        }

        return round($price - ($discount / 100) * $price, 2);
    }
}
