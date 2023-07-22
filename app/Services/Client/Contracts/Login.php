<?php

namespace App\Services\Client\Contracts;

interface Login
{
    public function execute(string $email, string $password);
}
