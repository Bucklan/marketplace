<?php

namespace App\Http\Resources;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\Translation\t;

class CartResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
//            'product' => $this->product,
            'product' => ProductResource::collection(Product::where('id', '=', $this->product_id)->get()),
            'number' => $this->number,
            'status' => $this->status,
            'total' => $this->number* $this->product->price,
            'seller' => $this->user->name,
//            'seller' => User::where('id', '=', $this->user_id)->first()->name,
        ];
    }
}
