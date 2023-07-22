<?php

namespace App\Services\Client\Resource\Product;

use App\Models\Product;
use App\Services\Client\Resource\Image\AllResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Enums as Enums;

class AllByCategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Product $this */

        return [
            'product' => [
                'id' => $this->id,
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
//                'images' => AllResource::collection($this->files()),
            ],
        ];
    }
}
