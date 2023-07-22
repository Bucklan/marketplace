<?php

namespace App\Repositories;

interface CategoryRepositoryInterface extends EloquentRepositoryInterface
{
public function getCategoryWhereName(string $name);
}
