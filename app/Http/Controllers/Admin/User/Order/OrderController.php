<?php

namespace App\Http\Controllers\Admin\User\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Admin\Contracts as Contacts;
use App\Services\Admin\Requests as Requests;
use App\Services\Admin\Resources\Order\AllResource;

class OrderController extends Controller
{
    private string $url = 'admin.orders.';
    private string $route = 'admin.orders.';
    private string $message = 'Order successfully ';

    public function index()
    {
        $response = app(Contacts\GetAllOrders::class)->execute();
        $orders = AllResource::collection($response);
        return view($this->url . 'index', ['orders' => $orders->resolve()]);
    }

    public function confirmed(Order $order)
    {
        app(Contacts\ConfirmOrder::class)->execute($order);

        return redirect()->route($this->route . 'index')->with('message', 'This is Order successfully confirmed');

    }

    public function canceled(Order $order)
    {
        app(Contacts\CancelOrders::class)->execute($order);

        return redirect()->route($this->route . 'index')->withErrors('This is Order successfully canceled');
    }
}
