<?php

namespace App\Traits\Order;

use Illuminate\Database\Eloquent\Builder;
use App\Enums as Enums;

trait HasScopes
{
    public function scopeWhereOrderInCity(Builder $query, string $city_id): Builder
    {
        return $query->where('orders.city_id', $city_id);
    }

    public function scopeWhereCreated(Builder $query): Builder
    {
        return $query->where('orders.status', Enums\Order\Status::CREATED);
    }

    public function scopeWhereWaitingAcceptanceByCourier(Builder $query): Builder
    {
        return $query->where('orders.status', Enums\Order\Status::WAITING_ACCEPTANCE_BY_COURIER);
    }

    public function scopeWhereInProcessAcceptanceByCourier(Builder $query): Builder
    {
        return $query->where('orders.status', Enums\Order\Status::CLIENT_WAITING_COURIER);
    }

    public function scopeWhereDelivered(Builder $query): Builder
    {
        return $query->where('orders.status', Enums\Order\Status::DELIVERED);
    }

    public function scopeWhereCompleted(Builder $query): Builder
    {
        return $query->where('orders.status', Enums\Order\Status::COMPLETED);
    }

    public function scopeWhereDeclined(Builder $query): Builder
    {
        return $query->where('orders.status', Enums\Order\Status::CANCELED);
    }
}
