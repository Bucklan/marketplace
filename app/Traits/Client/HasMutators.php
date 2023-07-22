<?php

namespace App\Traits\Client;

trait HasMutators
{
    public function getFullNameAttribute(): string
    {
        return sprintf('%s %s', ucfirst($this->name), ucfirst($this->surname));
    }
}
