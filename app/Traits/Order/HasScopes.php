<?php

namespace App\Traits\Order;

use Illuminate\Database\Eloquent\Builder;
use App\Enums as Enums;

trait HasScopes
{


    public function scopeWhereCreated(Builder $query): Builder
    {
        return $query->where('orders.status', Enums\Order\Status::CREATED);
    }


    public function scopeWhereConfirmed(Builder $query): Builder
    {
        return $query->where('orders.status', Enums\Order\Status::CONFIRMED);
    }

    public function scopeWhereDeclined(Builder $query): Builder
    {
        return $query->where('orders.status', Enums\Order\Status::CANCELED);
    }
}
