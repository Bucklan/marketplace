<?php

namespace App\Http\Controllers\Admin\User\Account;

use App\Http\Controllers\Controller;
use App\Services\Admin\Contracts\Logout;

class LogoutController extends Controller
{
    public function logout()
    {
        app(Logout::class)->execute();

        return redirect()->route('login.form');}
}
