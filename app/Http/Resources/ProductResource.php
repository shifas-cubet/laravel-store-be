<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'discount' => $this->discount,
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

        return round(collect($reviews)->pluck('stars')->avg(), 2);
    }
}
