<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        return view('pages.animals', compact('animals'));
    }

    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return view('pages.detail', compact('animal'));
    }
}