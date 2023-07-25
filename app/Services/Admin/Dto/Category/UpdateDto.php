<?php

namespace App\Services\Admin\Dto\Category;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UpdateDto extends DataTransferObject
{
    public string $name;
    public string $image;
}
