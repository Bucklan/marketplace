<?php

namespace App\Traits;

use App\Services\Formatter\DateFormatter;
use Date;

trait HasTimestamp
{
    public function getCreatedAtDatetime(): ?string
    {
        return app(DateFormatter::class)->formatDatetime2ForView(Date::parse($this->created_at));
    }

    public function getUpdatedAtDatetime(): ?string
    {
        return app(DateFormatter::class)->formatDatetime2ForView(Date::parse($this->updated_at));
    }

    public function getDeletedAtDatetime(): ?string
    {
        return app(DateFormatter::class)->formatDatetime2ForView(Date::parse($this->deleted_at));
    }
}
