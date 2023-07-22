<?php

namespace App\Services\Admin\Actions\Product;

use App\Models\Product;
use App\Services\Admin\Contracts\CreateProduct;
use App\Services\Admin\Dto\Product\CreateDto;
use DB;
use function Illuminate\Events\queueable;

class CreateAction implements CreateProduct
{
    public function execute(CreateDto $dto): void
    {
        DB::transaction(function () use ($dto) {
            $this->createProduct($dto);
        });
    }

    private function createProduct(CreateDto $dto): Product
    {
        return Product::create(
            $dto->only(
                'name', 'description', 'price', 'quantity', 'category_id')->toArray());
    }

    //Upload Images
}
