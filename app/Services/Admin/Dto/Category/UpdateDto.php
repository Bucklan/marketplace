<?php

namespace App\Services\Admin\Dto\Category;

use Spatie\DataTransferObject\DataTransferObject;

class UpdateDto extends DataTransferObject
{
    public string $name;
//    public array $images;
}
