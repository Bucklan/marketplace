<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->intended('/');
        }

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        if (Auth::attempt($validated)) {
            if (Auth::user()->hasRole('admin')) {
                if (Auth::user()->hasRole('moderator')) {
                    return redirect()->intended('/admin/cart');
                }
                return redirect()->intended('/admin/users');
            }
            return redirect()->intended('/products');
        }
        return redirect()->back()->withErrors('Incorrect email or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('register.form');
    }

//    public function profile()
//    {
//        $users = Auth::user();
//        $categories = Category::whereNull('parent_id')->with('categories.gender')->get();
//        $genders = Gender::all();
//        return view('gifts.profile', ['user' => $users, 'categories' => $categories,'genders'=>$genders]);
//    }
}
