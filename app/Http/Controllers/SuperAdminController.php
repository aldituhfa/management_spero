<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard()
    {
        return view('roles.superadmin.dashboard');
    }

    public function index()
    {
        $users = User::where('role', '!=', 'superadmin')->get();
        return view('roles.superadmin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|unique:users',
            'role'  => 'required|in:sales,project,finance',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => bcrypt($request->password),
        ]);

        return back()->with('success', 'User berhasil dibuat');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name'  => 'required',
        'email' => 'required|unique:users,email,' . $id,
        'role'  => 'required|in:sales,project,finance',
    ]);

    $user = User::findOrFail($id);
    $user->update([
        'name'  => $request->name,
        'email' => $request->email,
        'role'  => $request->role,
    ]);

    return back()->with('success', 'User berhasil diperbarui');
}

public function destroy($id)
{
    User::where('id', $id)->delete();
    return back()->with('success', 'User berhasil dihapus');
}

}
