<?php

namespace App\Repositories;

interface ProductRepositoryInterface extends EloquentRepositoryInterface
{
    public function GetAllByCategory(string $category_id,
                                     array $columns = ['*'],
                                     array  $relations = [],
                                     array  $relation_count = []);
}
