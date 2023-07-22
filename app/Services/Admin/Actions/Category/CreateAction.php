<?php

namespace App\Services\Admin\Actions\Category;

use App\Models\Category;
use App\Services\Admin\Contracts\CreateCategory;
use App\Services\Admin\Dto\Category\CreateDto;
use DB;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use App\Tasks as Tasks;

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
        Category::create($dto->only('name')->toArray());
    }
}
