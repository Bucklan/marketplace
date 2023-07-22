<?php

namespace App\Tasks\Product;

use App\Repositories\ProductRepositoryInterface;

class GetAllByCategoryTask
{
    public function __construct(private readonly ProductRepositoryInterface $repository)
    {
    }

    public function run(string $category_id,
                        array  $columns = ['*'],
                        array  $relations = [],
                        array  $relation_count = [])
    {
        return $this->repository->GetAllByCategory($category_id, $columns, $relations, $relation_count);
    }
}
