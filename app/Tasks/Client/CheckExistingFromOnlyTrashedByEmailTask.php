<?php

namespace App\Tasks\Client;

use App\Repositories\UserRepositoryInterface;

class CheckExistingFromOnlyTrashedByEmailTask
{
    public function __construct(private readonly UserRepositoryInterface $repository)
    {
    }

    public function run(string $email)
    {
        return $this->repository->checkExistingFromOnlyTrashedByEmail($email);
    }
}
