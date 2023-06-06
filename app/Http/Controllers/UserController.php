<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function confirm(Cart $cart)
    {
        $cart->update([
            'status' => 'confirmed'
        ]);
        return back()->with('message','Product successfully sold');
    }
    public function decline(Cart $cart)
    {
        $cart->delete();
        return back()->with('message','Product successfully sold');
    }

    public function cart()
    {
        $productsInCart = Cart::where('status', 'ordered')->with(['product', 'user'])->get();
        return view('admin.cart.index', ['productsInCart' => $productsInCart]);
    }

    public function index()
    {
        $users = User::orderBY('created_at')->where('name', '!=', 'admin')->get();
//        dd($users);
        return view('admin.users.index', ['users' => $users]);
    }


    public function edit(User $user)
    {
        $roles = Role::orderBY('name')->get();
        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => 'required',
                'role_id' => 'required|integer|exists:roles,id'
            ]
        );
        $user->update([
            'name' => $request->name,
        ]);
        $role = Role::find($request->role_id);
        $user->syncRoles($role->name);

        return redirect()->back()->with('message', 'User edited');
    }
}
