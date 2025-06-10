<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function store(Request $request){
        $validaytion = $request->validate([
            'user_name' => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validaytion['password'] = bcrypt($validaytion['password']);
        User::create($validaytion);
    }

    public function showLoginFrom(){
        return view('user.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'user_name' => 'The provided credentials do not match our records.',
        ]);

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
