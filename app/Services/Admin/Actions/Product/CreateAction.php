<?php

namespace App\Services\Admin\Actions\Product;

use App\Models\Product;
use App\Services\Admin\Contracts\CreateProduct;
use App\Services\Admin\Dto\Product\CreateDto;
use DB;
use App\SubActions as SubActions;

class CreateAction implements CreateProduct
{
    public function execute(CreateDto $dto): void
    {
        DB::transaction(function () use ($dto)
        {
           $product = $this->createProduct($dto);
           $this->addMultiImages($product,$dto);
        });

    }

    private function createProduct(CreateDto $dto)
    {
        return Product::create(
            $dto->only(
                'name', 'description', 'price', 'quantity', 'category_id')->toArray());
    }
    private function addMultiImages(Product $product, CreateDto $dto){
        foreach ($dto->images as $image){
            $product->addMedia($image)->toMediaCollection('products');
        }
    }
}
