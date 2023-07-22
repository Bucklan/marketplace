<?php

namespace App\Services\Client\Resources\Cart;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AllResource extends JsonResource
{
    public function toArray(Request $request)
    {
        /** @var Cart $this */


        $product = $this->product;


        return [
            'id' => $this->id,
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
//            'image' => $product->getImage(),
                'price' => $product->price,
            ],
        ];
    }
}
