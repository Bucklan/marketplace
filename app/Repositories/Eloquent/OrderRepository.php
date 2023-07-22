<?php

namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Repositories\OrderRepositoryInterface;
use Nette\Utils\Paginator;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function getAllByClient(string $client_id,
                                   array  $columns = ['*'],
                                   array  $relations = [],
                                   array  $relation_count = [])
    {
        return $this->model
            ->query()
            ->select($columns)
            ->where('user_id', $client_id)
            ->with($relations)
            ->withCount($relation_count)
            ->cursorPaginate();
    }

    public function getAllByStatus(string $status,
                                   array  $columns = ['*'],
                                   array  $relations = [],
                                   array  $relation_count = [])
    {
        return $this->model
            ->query()
            ->select($columns)
            ->where('status', $status)
            ->with($relations)
            ->withCount($relation_count)
            ->get();
    }


}
