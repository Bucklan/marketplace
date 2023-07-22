<?php

namespace App\Http\Controllers\Api\Guest\Auth;

use App\Http\Controllers\Controller;
use App\Services\Client\Contracts\Login;
use App\Services\Client\Request\Login\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        $login = app(Login::class);
        $response = $login->execute($email, $password);

        return response()->json($response);
    }
}
