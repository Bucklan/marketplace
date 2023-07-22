<?php

namespace App\Repositories\Eloquent;

use App\Models\Cart;
use App\Repositories\CartRepositoryInterface;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{
    public function __construct(Cart $model)
    {
        $this->model = $model;
    }

    public function getAllByClient(
        string $client_id,
        array  $columns = ['*'],
        array  $relations = [],
        array  $relation_count = []
    )
    {
        return $this->model
            ->query()
            ->select($columns)
            ->where('user_id', $client_id)
            ->with($relations)
            ->withCount($relation_count)
            ->get();
    }
}
