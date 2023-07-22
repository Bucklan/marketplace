<?php

namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements EloquentRepositoryInterface
{
    protected Model $model;

    public function getAll(
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Collection
    {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relations_count)
            ->latest('id')
            ->get();
    }

    public function getAllQuery(
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Builder
    {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relations_count);
    }

    public function getAllByIds(
        array $ids,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Collection
    {
        return $this->model
            ->query()
            ->whereIn('id', $ids)
            ->with($relations)
            ->withCount($relations_count)
            ->latest('id')
            ->get($columns);
    }

    public function search(
        array $filters,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Collection
    {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relations_count)
            ->filterBy($filters)
            ->get();
    }

    public function firstWhere(
        array $condition,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): ?Model {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relations_count)
            ->firstWhere($condition);
    }

    public function find(
        string $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): ?Model {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relations_count)
            ->find($modelId);
    }

    public function findOrFail(
        string $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): ?Model {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relations_count)
            ->findOrFail($modelId);
    }

    public function findOrFailTrashed(
        string $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): ?Model
    {
        return $this->model
            ->query()
            ->onlyTrashed()
            ->select($columns)
            ->with($relations)
            ->withCount($relations_count)
            ->findOrFail($modelId);
    }

    public function countByIds(array $ids): int
    {
        return $this->model
            ->query()
            ->whereIn('id', $ids)
            ->count();
    }

    public function count(): int
    {
        return $this->model
            ->query()
            ->count();
    }

    public function getList(
        string $value,
        ?string $key,
    ): array
    {
        return $this->model
            ->query()
            ->pluck($value, $key)
            ->toArray();
    }

    public function getLatest(
        int $limit,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Collection
    {
        return $this->model
            ->query()
            ->select($columns)
            ->with($relations)
            ->withCount($relations_count)
            ->limit($limit)
            ->latest('id')
            ->get();
    }
}
