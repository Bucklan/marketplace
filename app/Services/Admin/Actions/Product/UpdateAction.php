<?php

namespace App\Services\Admin\Actions\Product;

use App\Models\Product;
use App\Services\Admin\Contracts\UpdateProduct;
use App\Services\Admin\Dto\Product\UpdateDto;
use DB;

class UpdateAction implements UpdateProduct
{
    public function execute(Product $product, UpdateDto $dto)
    {
        DB::transaction(function () use ($product,$dto) {
            $this->updateProduct($product, $dto);
        });
    }

    private function updateProduct(Product $product, UpdateDto $dto)
    {
        $product->update($dto
            ->only('name','description','price','quantity','category_id')
            ->toArray());
    }
}
