<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, (bool) $request->boolean('remember'))) {
            $request->session()->regenerate();
            return $request->user()->isShelter()
                ? redirect()->intended(route('shelter.dashboard'))
                : redirect()->intended(route('catalog.index'));
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ])->onlyInput('email');
    }
}
