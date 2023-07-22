<?php

namespace App\Repositories\Eloquent;


use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getCategoryWhereName(string $name)
    {
        return $this->model
            ->query()
            ->where('name', $name)
            ->first();
    }

}
