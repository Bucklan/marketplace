<?php

namespace App\Tasks\Product;

use App\Repositories\ProductRepositoryInterface;

class GetAllProductTask
{
    public function __construct(private readonly ProductRepositoryInterface $repository)
    {
    }

    public function run(array $columns = ['*'],
                        array $relations = [],
                        array $relation_count = [])
    {
        return $this->repository->getAll($columns, $relations, $relation_count);
    }
}
