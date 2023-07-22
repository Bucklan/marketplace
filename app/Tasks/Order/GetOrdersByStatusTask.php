<?php

namespace App\Tasks\Order;

use App\Repositories\OrderRepositoryInterface;

class GetOrdersByStatusTask
{
    public function __construct(private readonly OrderRepositoryInterface $repository)
    {
    }

    public function run(string $status,
                        array  $columns = [],
                        array  $relations = [],
                        array  $relation_count = [])
    {
        return $this->repository->getAllByStatus($status, $columns, $relations, $relation_count);

    }
}
