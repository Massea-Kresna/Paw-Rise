<?php

namespace App\Http\Controllers;

use App\Models\Animal;

class AnimalController extends Controller
{
    public function show(Animal $animal)
    {
        $animal->load(['shelter', 'photos']);

        $similar = Animal::with('shelter')
            ->where('id', '!=', $animal->id)
            ->where('species', $animal->species)
            ->where('status', 'tersedia')
            ->take(4)
            ->get();

        return view('animals.show', compact('animal', 'similar'));
    }
}
