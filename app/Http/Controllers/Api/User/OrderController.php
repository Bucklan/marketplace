<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Services\Client\Contracts\GetAllOrdersByClient;
use App\Services\Client\Contracts\GetOrdersByStatus;
use App\Services\Client\Contracts\StoreOrder;
use App\Services\Client\Dto\Order\StoreDtoFactory;
use App\Services\Client\Request\Order\StoreRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $response = app(GetAllOrdersByClient::class)->execute();

        return response()->json($response);
    }

    public function by_status(Request $request)
    {
        $response = app(GetOrdersByStatus::class)
            ->execute($request->get('status'));
        return response()->json($response);
    }

    public function store(StoreRequest $request): void
    {
        app(StoreOrder::class)->execute(
            StoreDtoFactory::fromRequest($request)
        );
    }
}
