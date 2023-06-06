<?php

namespace App\Http\Controllers;

//use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('name')->where('name', '!=', 'admin')->get();
        return view('admin.roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        $permissions = Permission::orderBy('name')->get();
        return view('admin.roles.create', ['permissions' => $permissions]);
    }

    public function store(Request $request)
    {
//        dd($request->permissions);
        $request->validate([
            'name' => 'required|max:255',
            'permissions.*' => 'required|integer|exists:permissions,id'
        ]);

        $newRole = Role::create([
            'name' => $request->name,
        ]);
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $newRole->syncPermissions($permissions);
        return redirect()->back()->with('message', 'Role added');

    }

    public function show(Role $role)
    {
        //
    }

    public function edit(Role $role)
    {
        $role = Role::where('name' , '!=' , 'admin')->findOrFail($role->id);
        $permissions = Permission::orderBy('name')->get();
        return view('admin.roles.edit', ['role' => $role, 'permissions' => $permissions]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|max:255',
            'permissions' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id'
        ]);
        $role = Role::where('name' , '!=' , 'admin')->findOrFail($role->id);
        $role->update([
            'name' => $request->name,
        ]);
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($permissions);
        return redirect()->route('roles.index')->with('message', 'Role edited');

    }

    public function destroy(Role $role)
    {
        //
    }
}
