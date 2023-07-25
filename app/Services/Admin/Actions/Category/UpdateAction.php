<?php

namespace App\Services\Admin\Actions\Category;

use App\Models\Category;
use App\Services\Admin\Contracts\UpdateCategory;
use App\Services\Admin\Dto\Category\UpdateDto;
use DB;

class UpdateAction implements UpdateCategory
{
    public function execute(Category $category, UpdateDto $dto)
    {
        DB::transaction(function () use ($category, $dto) {
            $this->updateCategory($category, $dto);
        });
    }

    private function updateCategory(Category $category, UpdateDto $dto)
    {
        $category->update($dto->only('name')->toArray());
        $category->clearMediaCollectionExcept('categories',[$category->id]);
        $category->addMedia($dto->image)->toMediaCollection('categories');
    }
}
