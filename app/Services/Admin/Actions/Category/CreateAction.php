<?php

namespace App\Services\Admin\Actions\Category;

use App\Models\Category;
use App\Services\Admin\Contracts\CreateCategory;
use App\Services\Admin\Dto\Category\CreateDto;
use DB;
use App\Tasks as Tasks;
use App\SubActions as SubActions;

class CreateAction implements CreateCategory
{
    public function execute(CreateDto $dto)
    {

        DB::transaction(function () use ($dto) {
            $this->createCategory($dto);
        });

    }

    private function createCategory(CreateDto $dto)
    {
        $category = Category::create($dto->only('name')->toArray());
        $category->addMedia($dto->image)
            ->toMediaCollection('categories');
    }
}
