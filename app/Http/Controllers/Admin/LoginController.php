<?php

namespace App\Http\Controllers\Admin;

use App\Services\Admin\Contracts as Contracts;
use App\Services\Admin\Requests\Login\LoginRequest;
use App\Tasks\Client\FindByEmailTask;
use Auth;

class LoginController
{
    public function login_form()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        app(Contracts\Login::class)->execute($request->email, $request->password);
        return redirect()->route('admin.products.index');
    }
}
