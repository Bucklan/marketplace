<?php

namespace App\Tasks\Category;

use App\Repositories\CategoryRepositoryInterface;

class GetCategoryWhereNameTask
{
public function __construct(private readonly CategoryRepositoryInterface $repository)
{
}
public function run(string $name){
    return $this->repository->getCategoryWhereName($name);
}
}
