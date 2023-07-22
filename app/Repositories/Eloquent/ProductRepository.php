<?php

namespace App\Repositories\Eloquent;


use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function GetAllByCategory(string $category_id,
                                     array  $columns = ['*'],
                                     array  $relations = [],
                                     array  $relation_count = [])
    {
        return $this->model
            ->query()
            ->select($columns)
            ->whereProductCategoryIs($category_id)
            ->joinRelationship('category')
            ->with($relations)
            ->withCount($relation_count)
            ->get();
    }
}
