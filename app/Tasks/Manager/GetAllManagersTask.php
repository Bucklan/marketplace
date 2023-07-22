<?php

namespace App\Tasks\Manager;

use App\Repositories\UserRepositoryInterface;

class GetAllManagersTask
{
    public function __construct(private readonly UserRepositoryInterface $repository)
    {
    }

    public function run(
        array $roles,
        array $columns = ['*'],
        array $relations = [],
        array $relation_count = [])
    {
        return $this->repository->getUsersByRoles($roles, $columns, $relations, $relation_count);
    }
}
