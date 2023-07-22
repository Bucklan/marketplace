<?php

namespace App\Http\Controllers\Api\Guest\Auth;

use App\Http\Controllers\Controller;
use App\Services\Client\Contracts\Register;
use App\Services\Client\Dto as Dto;
use App\Services\Client\Request\Register\RegisterRequest;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $response = app(Register::class)->execute(
            Dto\Register\RegisterDtoFactory::fromRequest($request)
        );

        return response()->json($response);
    }
}
