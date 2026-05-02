<?php

namespace App\Http\Controllers\Shelter;

use App\Http\Controllers\Controller;
use App\Models\Animal;

class DashboardController extends Controller
{
    public function index()
    {
        $shelter = auth()->user()->shelter;
        $animals = collect();

        if ($shelter) {
            $animals = Animal::where('shelter_id', $shelter->id)
                ->latest()
                ->paginate(10);
        }

        return view('shelter.dashboard', compact('animals'));
    }
}
