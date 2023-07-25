<?php

namespace App\Services\Admin\Actions\Product;

use App\Models\Product;
use App\Services\Admin\Contracts\UpdateProduct;
use App\Services\Admin\Dto\Product\UpdateDto;
use DB;
use Illuminate\Support\Facades\Redirect;

class UpdateAction implements UpdateProduct
{
    public function execute(Product $product, UpdateDto $dto)
    {
        DB::transaction(function () use ($product, $dto) {
            $this->validateDto($dto);
            $product = $this->updateProductDetails($product, $dto);
            $this->updateProductMedias($product, $dto);
        });
    }

    private function validateDto(UpdateDto $dto): void
    {
        if ($this->hasValidImages($dto)) {
            throw new \InvalidArgumentException('Photo not found');
        }
    }

    private function updateProductDetails(Product $product, UpdateDto $dto): Product
    {
        $updateStatus = $product->update($dto
            ->only('name', 'description', 'price', 'quantity', 'category_id')
            ->toArray());

        if (! $updateStatus) {
            throw new \RuntimeException('Failed to update product details');
        }

        return $product;
    }

    private function updateProductMedias(Product $product, UpdateDto $dto): void
    {
        $product->clearMediaCollectionExcept('products', [$product->id]);
        $this->attachImagesToProduct($dto, $product);
    }

    private function hasValidImages(UpdateDto $dto): bool
    {
        return is_null($dto->images);
    }

    private function attachImagesToProduct(UpdateDto $dto, Product $product): void
    {
        foreach ($dto->images as $image) {
            $product->addMedia($image)->toMediaCollection('products');
        }
    }
}
