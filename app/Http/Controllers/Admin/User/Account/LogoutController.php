<?php

namespace App\Http\Controllers\Admin\User\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
       auth()->logout();

        return redirect()->route('login.form');
    }
}
