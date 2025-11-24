<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $role = auth()->user()->role;

            return match ($role) {
                'superadmin' => redirect()->route('roles.superadmin.dashboard'),
                'sales'      => redirect()->route('roles.sales.dashboard'),
                'project'    => redirect()->route('roles.project.dashboard'),
                'finance'    => redirect()->route('roles.finance.dashboard'),
            };
        }

        return back()->with('error', 'Email atau Password salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
