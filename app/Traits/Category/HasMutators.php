<?php

namespace App\Traits\Category;

trait HasMutators
{
    public function getProductsCountAttribute($value): int
    {
        return $value ?? $this->products()->count();
    }
}
