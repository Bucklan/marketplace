<?php

namespace App\Services\Admin\Actions;

use App\Models\User;
use App\Services\Admin\Contracts\Logout;
use Illuminate\Support\Facades\Auth;

class LogoutAction implements Logout
{
    public function execute()
    {
        /** @var User $user */
        Auth::logout();
    }
}
