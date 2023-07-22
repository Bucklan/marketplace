<?php

namespace App\Services\Admin\Contracts;

use App\Models\Product;

interface DeleteProduct
{
public function execute(Product $product);
}
