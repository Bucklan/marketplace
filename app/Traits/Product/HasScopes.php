<?php

namespace App\Traits\Product;

use Illuminate\Database\Eloquent\Builder;
use App\Enums as Enums;

trait HasScopes
{
    public function scopeWhereProductCategoryIs(Builder $query, string $category_id): Builder
    {
        return $query->where('products.category_id', $category_id);
    }
}
