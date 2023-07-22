<?php

namespace App\Services\Client\Resource\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetListResource extends JsonResource
{
public function toArray(Request $request)
{

    /** @var Category $this */
    return [
        'id' =>$this->id,
      'name' => $this->name,
    ];
}
}
