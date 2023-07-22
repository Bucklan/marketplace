<?php

namespace App\Tasks\Order;

use App\Repositories\OrderRepositoryInterface;

class GetAllOrdersByClientTask
{
    public function __construct(private readonly OrderRepositoryInterface $repository)
    {

    }

    public function run(
        string $client_id,
        array $columns = ['*'],
        array $relations = [],
        array $relation_count = []
    )
    {
        return $this->repository->getAllByClient($client_id, $columns, $relations, $relation_count);
    }
}
