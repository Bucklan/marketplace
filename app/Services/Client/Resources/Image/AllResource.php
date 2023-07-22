<?php

namespace App\Services\Client\Resources\Image;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\File;
class AllResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var File $this */

        return [
            'path' => $this->getFile(),
        ];
    }
}
