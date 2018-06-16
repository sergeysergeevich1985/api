<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'totalPrice' => round((1 - ($this->discount / 100)) * $this->price, 2),
            'rating' => $this->reviews->count() ? round($this->reviews->sum('star') / $this->reviews->count(), 2) : 'No rating yet!',
            'href' => [
                'link' => route('products.show', $this)
            ]
        ];

        //return parent::toArray($request);
    }
}
