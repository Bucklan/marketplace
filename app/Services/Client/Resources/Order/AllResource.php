<?php

namespace App\Services\Client\Resources\Order;

use App\Models\Order;
use App\Services\Client\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AllResource extends JsonResource
{
public function toArray(Request $request)
{
    /** @var Order $this */
    return [
        'products.*' => $this->orderProducts,
        'amount' => $this->amount,
        'status' => $this->status,

    ];
}
}
