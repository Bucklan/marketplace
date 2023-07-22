<?php

namespace App\Traits;

use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    public function scopeFilterBy($query, $filters): Builder
    {
        $classname = class_basename($this);
        $filter = new FilterBuilder($query, $filters, "App\Filters\\$classname");

        return $filter->apply();
    }
}
