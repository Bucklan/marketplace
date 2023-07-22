<?php

namespace App\Services\Admin\Resources\Order;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AllResource extends JsonResource
{
    public function toArray(Request $request)
    {
        /** @var Order $order */
        $order = $this->resource;

        return [
            'id' => $order->id,
            'amount' => $order->amount,
            'status' => $order->getStatusDescription(),
            'status_class' => $order->getStatusClass(),
            'client' => $this->getClientData($order->user),
            'products' => $this->getProductData($order),
        ];
    }

    private function getClientData($client): array
    {
        return [
            'id' => $client->id,
            'name' => $client->name,
            'email' => $client->email,
        ];
    }

    private function getProductData(Order $order)
    {
        return $order->orderProducts->map(function (OrderProduct $orderProduct) use ($order) {
            $product = $orderProduct->product()->first();
            $quantity = $order->amount / $product?->price;

            return [
                'id' => $product?->id,
                'name' => $product?->name,
                'quantity' => $quantity,
            ];
        });
    }
}
