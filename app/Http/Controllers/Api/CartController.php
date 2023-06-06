<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
//use App\Http\Requests\Cart\CartRequest;
use App\Http\Requests\CartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return CartResource::collection(Cart::all());
    }

    public function store(CartRequest $request)
    {
        $cart = Cart::create($request->validated());
        return new CartResource($cart);
    }
    public function show()
    {
        return response(null,404);
    }

    public function update(CartRequest $request, Cart $cart)
    {
        $cart = $cart->update($request->validated());
        return new CartResource($cart);
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return response(null, 204);
    }
}
