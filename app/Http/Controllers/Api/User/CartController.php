<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Services\Client\Contracts as Contracts;
use App\Services\Client\Resources as Resources;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $response = app(Contracts\GetAllCarts::class)->execute();
        return Resources\Cart\AllResource::collection($response);///////bitpedi
    }

    public function store(Product $product, Request $request): void
    {
        app(Contracts\AddProductToCart::class)->execute(
            $product, $request->get('quantity')
        );
    }
}
