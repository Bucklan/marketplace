<?php

namespace App\Traits;

use App\Models\DeviceToken;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasDeviceTokens
{
    public function device_tokens(): MorphMany
    {
        return $this->morphMany(DeviceToken::class, 'tokenable');
    }

    public function device_token(): MorphOne
    {
        return $this->morphOne(DeviceToken::class, 'tokenable');
    }
}
