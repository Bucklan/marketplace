<?php

namespace App\Services\Admin\Dto\Category;

use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CreateDto extends DataTransferObject
{
    public string $name;
    public string $image;
}
