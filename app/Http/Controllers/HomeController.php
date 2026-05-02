<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Animal::with('shelter')
            ->where('status', 'tersedia')
            ->latest()
            ->take(6)
            ->get();

        return view('home.landing', compact('featured'));
    }

    public function education()
    {
        return view('home.education');
    }

    public function about()
    {
        return view('home.about');
    }

    public function help()
    {
        return view('home.help');
    }

    public function sendContact(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:80',
            'last_name'  => 'nullable|string|max:80',
            'email'      => 'required|email',
            'subject'    => 'required|string|max:120',
            'message'    => 'required|string|max:2000',
        ]);
        // For now we just flash a success — wire up to mail / DB later.
        return redirect()->route('home')->with('success', 'Pesan Anda telah terkirim. Terima kasih telah menghubungi kami.');
    }
}
