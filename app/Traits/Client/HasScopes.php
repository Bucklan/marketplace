<?php

namespace App\Traits\Client;

use Illuminate\Database\Eloquent\Builder;

trait HasScopes
{
    public function scopeWhereActive(Builder $query): Builder
    {
        return $query->whereNotNull('phone_verified_at')
            ->whereNull('login_blocked_at')
            ->whereNotNull('activated_at')
            ->whereNotNull('device_token');
    }
}
