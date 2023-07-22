<?php

namespace App\Tasks\Order;

use App\Repositories\OrderRepositoryInterface;

class GetAllOrdersTask
{
    public function __construct(private readonly OrderRepositoryInterface $repository)
    {
    }

    public function run($columns = ['*'],
                        array $relations = [],
                        array $relation_count = [])
    {
        return $this->repository->getAll($columns, $relations, $relation_count);
    }
}
