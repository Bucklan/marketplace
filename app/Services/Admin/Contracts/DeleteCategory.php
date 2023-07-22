<?php

namespace App\Services\Admin\Contracts;

use App\Models\Category;

interface DeleteCategory
{
public function execute(Category $category);
}
