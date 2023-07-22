<?php

namespace App\Services\Admin\Actions\Product;

use App\Services\Admin\Contracts\GetAllProduct;
use App\Tasks as Tasks;

class GetAllAction implements GetAllProduct
{
    public function execute()
    {
        return app(Tasks\Product\GetAllProductTask::class)->run(
            ['products.id','products.name','products.description','products.price','products.category_id'],
            ['category']
        );
}
}
