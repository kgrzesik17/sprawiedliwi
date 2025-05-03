<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Auth;
use App\Models\User;


class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('index');
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('panel');
        }
        throw ValidationException::withMessages([
            'credentials' => 'Niepoprawne dane logowania'
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}

