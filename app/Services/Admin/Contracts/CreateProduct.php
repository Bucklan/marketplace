<?php

namespace App\Services\Admin\Contracts;

use App\Services\Admin\Dto\Product\CreateDto;

interface CreateProduct
{
    public function execute(CreateDto $dto);
}
