<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array
     */
    public function toArray(Request $request): array
    {

        return [
            'data' => $this->collection,
            'meta' => [
//                'total' => $this->total(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                // Add any other meta information you need
            ],
        ];


        $data = $this->collection->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                // Include any other properties you want to expose
            ];
        });

        return [
            'data' => $data,
            'pagination' => [
                'total' => $this->total(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'last_page' => $this->lastPage(),
                'from' => $this->firstItem(),
                'to' => $this->lastItem(),
            ]
        ];
    }
}
