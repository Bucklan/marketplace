<?php

namespace App\Services\Client\Contracts;

use App\Services\Client\Dto\Register\RegisterDto;

interface Register
{
public function execute(RegisterDto $dto);
}
