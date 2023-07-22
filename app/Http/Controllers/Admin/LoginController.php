<?php

namespace App\Http\Controllers\Admin;

class LoginController
{
    public function login_form()
    {
        return view('auth.login');
    }
    public function login()
    {
        return view('auth.login');
    }
}
