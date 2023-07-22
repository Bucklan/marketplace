<?php

namespace App\Services\Admin\Dto\Category;

use Spatie\DataTransferObject\DataTransferObject;

class CreateDto extends DataTransferObject
{
    public string $name;
//    public array $images;
}
