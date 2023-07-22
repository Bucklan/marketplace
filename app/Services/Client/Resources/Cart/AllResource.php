<?php

namespace App\Services\Client\Resource\Cart;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AllResource extends JsonResource
{
    public function toArray(Request $request)
    {
dd($request);
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
