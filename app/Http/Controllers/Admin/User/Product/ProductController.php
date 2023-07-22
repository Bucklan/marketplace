<?php

namespace App\Http\Controllers\Admin\User\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Admin\Contracts as Contracts;
use App\Services\Admin\Dto as Dto;
use App\Services\Admin\Requests as Request;
use Auth;

class ProductController extends Controller
{

    private string $url = 'admin.products.';
    private string $route = 'admin.products.';


    public function index()
    {
        $this->authorize('viewAny', Auth::user());

        $products = app(Contracts\GetAllProduct::class)->execute();
        $categories = app(Contracts\GetAllCategories::class)->execute();


        return view($this->url . 'index',
            ['products' => $products,
                'categories' => $categories]);
    }

    public function edit(Product $product)
    {
        $this->authorize('viewAny', Auth::user());

        $categories = app(Contracts\GetAllCategories::class)->execute();

        return view($this->url . 'edit', ['product' => $product, 'categories' => $categories]);
    }

    public function store(Request\Product\StoreRequest $request)
    {
        $this->authorize('viewAny', Auth::user());

        app(Contracts\CreateProduct::class)->execute(Dto\Product\CreateDtoFactory::fromRequest($request));
        return redirect()->route($this->route . 'index')
            ->with('message', 'Product successfully created');
    }

    public function update(Product $product, Request\Product\UpdateRequest $request)
    {
        $this->authorize('viewAny', Auth::user());

        app(Contracts\UpdateProduct::class)->execute(
            $product, Dto\Product\UpdateDtoFactory::fromRequest($request));


        return redirect()->route($this->route . 'index')
            ->with('message', 'Product successfully updated');

    }

//
    public function destroy(Product $product)
    {
        $this->authorize('viewAny', Auth::user());

        app(Contracts\DeleteProduct::class)->execute($product);
        return redirect()->route($this->route . 'index')
            ->with('message', 'Product successfully deleted');
    }
}
