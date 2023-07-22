<?php

namespace App\Services\Client\Contracts;

use App\Models\Category;

interface GetProductsByCategory
{
public function execute(Category $category);
}
