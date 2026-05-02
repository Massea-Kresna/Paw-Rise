<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        if ($user && $user->isShelter()) {
            return view('shelter.logout');
        }
        return view('user.logout');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Anda telah keluar.');
    }
}
