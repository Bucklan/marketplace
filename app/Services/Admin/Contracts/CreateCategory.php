<?php

namespace App\Services\Admin\Contracts;

use App\Services\Admin\Dto\Category\CreateDto;

interface CreateCategory
{
public function execute(CreateDto $dto);
}
