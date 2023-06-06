<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $productsInCart = Auth::user()->productsWithStatus('in_cart')->where('number', '>', 0)->get();
        $productsIsNull = Auth::user()->productsWithStatus('in_cart')->where('number', '<=', 0)->get();
        for ($i = 0; $i < count($productsIsNull); $i++) {
            if ($productsIsNull[$i]->pivot->number <= 0 && $productsIsNull[$i] != null) {
                $this->deleteFromCart($productsIsNull[$i]);
                return back();
            }
        }
        $total = 0;
        for ($i = 0; $i < count($productsInCart); $i++) {
            $total = $total + $productsInCart[$i]->price * $productsInCart[$i]->pivot->number;
        }
        for ($i = 0; $i < count($productsInCart); $i++) {
            if ($productsInCart[$i]) {
                return view('cart.index', ['productsInCart' => $productsInCart, 'total' => $total]);
            }
        }
        return view('cart.index', ['productsInNull' => true]);
    }


    public function putToCart(Product $product)
    {

        $productsInCart = Auth::user()->productsWithStatus('in_cart')->where('product_id', $product->id)->first();
        if ($productsInCart != null)
            Auth::user()->productsWithStatus('in_cart')
                ->updateExistingPivot($product->id,
                    ['number' => $productsInCart->pivot->number + 1]);
        else
            Auth::user()->productsWithStatus('in_cart')
                ->attach($product->id, ['number' => 1]);
//        dd(count($productsInCart));

        return redirect()->route('cart.index')->with('message', 'cart to successfully added');
    }


    public function store()
    {
        $ids = Auth::user()->productsWithStatus('in_cart')->allRelatedIds();
        foreach ($ids as $id) {
            Auth::user()->productsWithStatus('in_cart')->updateExistingPivot($id, ['status' => 'ordered']);
        }
        return back()->with('message', 'your carts successfully sended');
    }

    public function destroy(Product $product)
    {
        $productsInCart = Auth::user()->productsWithStatus('in_cart')->where('product_id', $product->id)->first();
        if ($productsInCart != null)
            Auth::user()->productsWithStatus('in_cart')->updateExistingPivot($product->id,
                ['number' => $productsInCart->pivot->number - 1]);
        else
            Auth::user()->productsWithStatus('in_cart')->attach($product->id,
                ['number' => 1]);

        return redirect()->route('cart.index')->with('message', 'cart to successfully deleted');
    }

    public function destroyInIndex(Product $product)
    {
        $productsBought = Auth::user()->productsWithStatus('in_cart')
            ->where('product_id', $product->id)->first();
        if ($productsBought != null)
            Auth::user()->productsWithStatus('in_cart')->detach($product->id);
        return back()->with('message', 'cart to successfully deleted');
    }

    public function destroyAll()
    {
        $productsBought = Auth::user()->productsWithStatus('in_cart')->get();
        if ($productsBought != null)
            Auth::user()->productsWithStatus('in_cart')->detach();
        return redirect()->route('cart.index')->with('message', 'cart to successfully deleted');
    }

}
