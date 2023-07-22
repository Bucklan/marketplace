<?php

namespace App\Services\Client\Resources\Product;

use App\Models\Product;
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
