<?php

namespace App\Repositories;

interface CartRepositoryInterface extends EloquentRepositoryInterface
{
public function getAllByClient(string $client_id,
                               array  $columns = [],
                               array  $relations = [],
                               array  $relation_count = []);
}
