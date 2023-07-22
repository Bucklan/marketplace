<?php

namespace App\Services\Client\Actions\Cart;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Services\Client\Contracts\AddProductToCart;
use Auth;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;

class AddProductAction implements AddProductToCart
{
    public function execute(Product $product, string $quantity)
    {
        /** @var User $client */
        $client = Auth::user();

        $this->checkProductIsAlreadyInCart($client, $product);
        $this->checkThatTheProductIsEnough($product,$quantity);
        Cart::create([
            'user_id' => $client->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
        ]);
    }

    private function checkProductIsAlreadyInCart(User $client, Product $product): void
    {
        if ($client->carts->contains('product_id', '=', $product->id)) {
            throw new AccessDeniedException(
                'The product is already in the cart.'
            );
        }
    }
    private function checkThatTheProductIsEnough(Product $product,string $quantity){
        if ($product->quantity < $quantity){
            throw new AccessDeniedException(
                'There is not enough product'
            );
        }
    }

}
