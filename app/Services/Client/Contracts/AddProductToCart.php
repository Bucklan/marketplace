<?php

namespace App\Services\Client\Contracts;

use App\Models\Product;

interface AddProductToCart
{
public function execute(Product $product,string $quantity);
}
