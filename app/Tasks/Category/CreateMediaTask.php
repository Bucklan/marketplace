<?php

namespace App\Tasks\Category;

use App\Models\Category;
use App\Enums as Enums;
use Illuminate\Database\Eloquent\Model;

class CreateMediaTask
{
    public function run(Category $model, array $payload): Model
    {
        return $model->file()->create($payload);
    }
}
