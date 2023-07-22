<?php

namespace App\Traits\Product;

use Illuminate\Database\Eloquent\Builder;
use App\Enums as Enums;

trait HasScopes
{
    public function scopeWhereProductIsGame(Builder $query): Builder
    {
        return $query->where('products.type', Enums\Product\Type::GAME);
    }

    public function scopeWhereProduct(Builder $query): Builder
    {
        return $query->where('products.type', Enums\Product\Type::PRODUCT);
    }

    public function scopeWhereProductIsSet(Builder $query): Builder
    {
        return $query->where('products.type', Enums\Product\Type::SET);
    }

    public function scopeWhereProductInCity(Builder $query, string $city_id): Builder
    {
        return $query->where('categories.city_id', $city_id);
    }

    public function scopeWhereGameGenreIs(Builder $query, string $genre_id): Builder
    {
        return $query->whereHas('genres', function($query) use($genre_id) {
            $query->where('genre_id', $genre_id);
        });
    }

    public function scopeWhereProductCategoryIs(Builder $query, string $category_id): Builder
    {
        return $query->where('products.category_id', $category_id);
    }
}
