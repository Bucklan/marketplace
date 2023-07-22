<?php

namespace App\Services\Admin\Contracts;

use App\Models\Category;
use App\Services\Admin\Dto\Category\UpdateDto;

interface UpdateCategory
{
public function execute(Category $category,UpdateDto $dto);
}
