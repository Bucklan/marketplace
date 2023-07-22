<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    public function checkExistingFromOnlyTrashedByEmail(string $email): bool;

    public function checkExistingByEmail(string $email): bool;

    public function FindByEmail(string $email,
    ): User;

    public function getUsersByRoles(
        array $roles,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    );
}
