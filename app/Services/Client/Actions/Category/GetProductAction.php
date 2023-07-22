<?php

namespace App\Services\Client\Actions\Category;

use App\Models\Category;
use App\Services\Client\Contracts\GetProductsByCategory;
use App\Tasks\Product\GetAllByCategoryTask;

class GetProductAction implements GetProductsByCategory
{
    public function execute(Category $category)
    {
        return app(GetAllByCategoryTask::class)->run(
            $category->id
        );
    }

}
