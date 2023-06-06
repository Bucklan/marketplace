<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
//        dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:2|confirmed',
//            'image' => 'mimes:jpg,png,jpeg,gif,webp',//|dimensions:min_width=16,min_height=16,max_width=100,max_height=100
        ]);
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->assignRole('user');

        Auth::login($user);

        return redirect()->route('products.index');

    }

//    public function update(Request $request, User $user)
//    {
////        dd($user->name);
//        $validate = $request->validate([
//            'name' => 'required|string|max:255',
//        ]);
//
//        Auth::user()->update($validate);
//        return redirect()->route('profile.form')->with('message', 'Your profile successfully edited');
//    }

}
