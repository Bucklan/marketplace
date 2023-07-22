<?php

namespace App\Tasks\Client;

use App\Repositories\UserRepositoryInterface;

class GetAllClientsTask
{
    public function __construct(private readonly UserRepositoryInterface $repository)
    {
    }

    public function run(array $roles,
                        array $columns = ['*'],
                        array $relations = [],
                        array $relation_count = [])
    {
        return $this->repository
            ->getUsersByRoles($roles, $columns, $relations, $relation_count);
    }
}
