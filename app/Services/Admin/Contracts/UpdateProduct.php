<?php

namespace App\Services\Admin\Contracts;

use App\Models\Product;
use App\Services\Admin\Dto\Product\UpdateDto;

interface UpdateProduct
{
    public function execute(Product $product,UpdateDto $dto);
}
