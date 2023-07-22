<?php

namespace App\Tasks\Client;

use App\Repositories\UserRepositoryInterface;

class CheckExistingByEmailTask
{
    public function __construct(private readonly UserRepositoryInterface $repository)
    {
    }

    public function run(string $email)
    {
        return $this->repository->checkExistingByEmail($email);
    }
}
