<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function checkExistingByEmail(string $email): bool
    {
        return $this->model
            ->query()
            ->where('email', $email)
            ->exists();
    }

    public function checkExistingFromOnlyTrashedByEmail(string $email) :bool
    {
        return $this->model
            ->query()
            ->onlyTrashed()
            ->where('email', $email)
            ->exists();
    }

    public function FindByEmail(string $email) :User
    {
        return $this->model
            ->query()
            ->where('email',$email)
            ->first();
    }
    public function getUsersByRoles(
        array $roles,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    )
    {
        return $this->model
            ->query()
            ->role($roles)
            ->select($columns)
            ->with($relations)
            ->withCount($relations_count)
            ->get();
    }
}
