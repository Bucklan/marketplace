<?php

namespace App\Tasks\Category;

use App\Repositories\CategoryRepositoryInterface;

class GetListTask
{
    public function __construct(private readonly CategoryRepositoryInterface $repository)
    {
    }

    public function run()
    {
        return $this->repository->getAll();
    }
}
