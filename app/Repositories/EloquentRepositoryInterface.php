<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    public function getAll(
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Collection;

    public function getAllQuery(
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Builder;

    public function getAllByIds(
        array $ids,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Collection;

    public function search(
        array $filters,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Collection;

    public function find(
        string $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): ?Model;

    public function firstWhere(
        array $condition,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): ?Model;

    public function findOrFail(
        string $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): ?Model;

    public function findOrFailTrashed(
        string $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): ?Model;

    public function countByIds(array $ids): int;

    public function count(): int;

    public function getList(
        string $value,
        ?string $key,
    ): array;

    public function getLatest(
        int $limit,
        array $columns = ['*'],
        array $relations = [],
        array $relations_count = []
    ): Collection;
}
