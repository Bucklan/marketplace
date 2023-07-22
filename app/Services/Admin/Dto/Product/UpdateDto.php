<?php

namespace App\Services\Admin\Dto\Product;

use Spatie\DataTransferObject\DataTransferObject;

class CreateDto extends DataTransferObject
{
    public string $name;
    public string $description;
    public int $price;
    public int $quantity;
    public int $category_id;
//    public array $images;
}
