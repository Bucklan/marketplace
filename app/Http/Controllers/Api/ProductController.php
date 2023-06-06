<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::all());

    }

    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->validated());
        return new ProductResource($product);
    }

    public function show($id)
    {
        return new ProductResource(Product::findOrFail($id));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->validated());
        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->comments()->delete();
        Cart::where('product_id', '=', $product->id)->delete();
        $product->delete();
        return response(null, 204);
    }
}
