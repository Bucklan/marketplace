<?php

namespace App\Tasks\Cart;

use App\Repositories\CartRepositoryInterface;

class GetAllTask
{
    public function __construct(private readonly CartRepositoryInterface $repository)
    {
    }

    public function run(string $client_id,
                        array  $columns = [],
                        array  $relations = [],
                        array  $relation_count = []
    )
    {
        return $this->repository
            ->getAllByClient($client_id, $columns, $relations, $relation_count);
}
}
