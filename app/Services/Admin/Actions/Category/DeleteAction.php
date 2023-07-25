<?php

namespace App\Services\Admin\Actions\Category;

use App\Models\Category;
use App\Services\Admin\Contracts\DeleteCategory;

class DeleteAction implements DeleteCategory
{
    public function execute(Category $category)
    {
        $category->delete();
        $category->clearMediaCollectionExcept('categories',[$category->id]);
    }
}
