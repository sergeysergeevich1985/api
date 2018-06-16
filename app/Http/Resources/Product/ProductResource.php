<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->details,
            'price' => $this->price,
            'stock' => $this->stock,
            'discount' => $this->discount,
            'totalPrice' => round((1 - ($this->discount / 100)) * $this->price, 2),
            'rating' => $this->reviews->count() ? round($this->reviews->sum('star') / $this->reviews->count(), 2) : 'No rating yet!',
            'href' => [
                'reviews' => route('reviews.index', $this) // or $this->id
            ]
        ];

        //return parent::toArray($request);
    }
}
