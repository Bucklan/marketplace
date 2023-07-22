<?php

namespace App\Traits\Category;

use Illuminate\Database\Eloquent\Builder;

trait HasScopes
{
    public function scopeWhereCategoryInCity(Builder $query, string $city_id): Builder
    {
        return $query->where('categories.city_id', $city_id);
    }
}
