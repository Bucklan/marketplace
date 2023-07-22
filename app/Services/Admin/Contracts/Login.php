<?php

namespace App\Services\Admin\Contracts;

interface Login
{
    public function execute(string $email, string $password);
}
