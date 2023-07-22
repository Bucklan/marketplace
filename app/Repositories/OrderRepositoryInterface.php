<?php

namespace App\Repositories;

interface OrderRepositoryInterface extends EloquentRepositoryInterface
{
    public function getAllByClient(string $client_id,
                                   array  $columns = ['*'],
                                   array  $relations = [],
                                   array  $relation_count = []);

    public function getAllByStatus(string $status,
                                   array  $columns = ['*'],
                                   array  $relations = [],
                                   array  $relation_count = []);
}
