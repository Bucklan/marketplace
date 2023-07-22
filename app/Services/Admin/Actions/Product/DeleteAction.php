<?php

namespace App\Services\Admin\Actions\Product;

use App\Models\Product;
use App\Services\Admin\Contracts\DeleteProduct;

class DeleteAction implements DeleteProduct
{
public function execute(Product $product)
{
    $product->delete();
}
}
