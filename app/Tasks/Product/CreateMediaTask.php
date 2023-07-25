<?php

namespace App\Tasks\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use App\Enums as Enums;

class CreateMediaTask
{
    public function run(Product $model, array $payload): Model
    {
        return $model->file()->create($payload);
    }
}
