<?php

namespace App\Services\Client\Actions\Order;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Enums as Enums;
use App\Models\User;
use App\Services\Client\Contracts\StoreOrder;
use App\Services\Client\Dto\Order\StoreDto;
use Auth;
use DB;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Throwable;
use App\Tasks as Tasks;

class StoreAction implements StoreOrder
{
    /**
     * @throws Throwable
     */
    public function execute(StoreDto $dto): void
    {
        /** @var User $user */
        $user = Auth::user();

        $this->ensureProductsIsExists($dto);
        $this->ensureProductsQuantityIsSufficient($dto);
        $this->orderProductAmount($user->id, $dto);
    }


    private function createOrder(int $userId, int $amountOrders): Order
    {
        return Order::create([
            'user_id' => $userId,
            'amount' => $amountOrders,
            'ordered_at' => now(),
            'status' => Enums\Order\Status::CREATED,
        ]);
    }

    private function createOrderProducts(StoreDto $dto, int $orderId): void
    {
        foreach ($dto->products as $orderProduct) {
            $product = Product::find($orderProduct['product_id']);

            $orderProduct = OrderProduct::create([
                'order_id' => $orderId,
                'product_id' => $product->id,
            ]);

            $product->update([
                'quantity' => $product->quantity - $orderProduct['quantity']
            ]);

        }
    }

    private function orderProductAmount(int $userId, StoreDto $dto)
    {
        DB::transaction(function () use ($userId, $dto) {
            $amountOrders = 0;
            foreach ($dto->products as $orderProduct) {
                $productPrice = Product::find($orderProduct['product_id'])->price;
                $amountOrders += $productPrice * $orderProduct['quantity'];
            }
            $order = $this->createOrder($userId, $amountOrders);
            $this->createOrderProducts($dto, $order->id);
        });
    }

    private function ensureProductsQuantityIsSufficient(StoreDto $dto): void
    {

        foreach ($dto->products as $orderProduct) {
            $product = Product::find($orderProduct['product_id']);
            if ($orderProduct['quantity'] > $product->quantity) {
                throw new AccessDeniedException(
                    __('Недостаточно товара.')
                );
            }
        }
    }

    private function ensureProductsIsExists(StoreDto $dto): void
    {
        foreach ($dto->products as $product) {
            if (!Product::find($product['product_id'])) {
                throw new AccessDeniedException(
                    __('Этот товар не существует.')
                );
            }
        }
    }
}
