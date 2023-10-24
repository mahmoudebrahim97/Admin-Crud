<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $data = User::orderBy('id', 'DESC')->where('role_name', '["Admin"]')->paginate(5);
        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function userIndex(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->where('role_name', '!=', '["admin"]')->paginate(5);
        return view('users.users_index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $input = $request->all();
        $user = User::create($input);
        $user->assignRole($request->input('role_name'));
        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }
    public function update(UserRequest $request, $id)
    {

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'status' => $request->status,
            'country' => $request->country,
        ]);
        $user = User::find($id);
        if ($user->role_name != '["Admin"]') {
            $user->syncPermissions($request->input('permission'));
        }
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
