<?php

namespace App\Services\Admin\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function boot()
    {
        return auth()->guest();
    }

    public function rules(){
        return [
          'email' => 'required|email|exists:users,email',
          'password' => 'required|min:8|string',
        ];
    }
}
