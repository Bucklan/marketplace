<?php

namespace App\Traits;

use App\Scopes\SortScope;

trait Orderable
{
    protected static function booted(): void
    {
        static::addGlobalScope(new SortScope());
    }
}
