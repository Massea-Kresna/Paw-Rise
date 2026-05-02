<?php

namespace App\Http\Controllers;

use App\Models\AdoptionApplication;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdoptionController extends Controller
{
    public function index()
    {
        $apps = AdoptionApplication::with(['animal.shelter'])
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(8);

        return view('user.applications', compact('apps'));
    }

    public function create(Animal $animal)
    {
        $animal->load('shelter');
        return view('adoption.create', compact('animal'));
    }

    public function store(Request $request, Animal $animal)
    {
        $data = $request->validate([
            'full_name'  => ['required', 'string', 'max:160'],
            'whatsapp'   => ['required', 'string', 'max:30'],
            'email'      => ['required', 'email'],
            'address'    => ['required', 'string', 'max:500'],
            'reason'     => ['required', 'string', 'max:2000'],
            'experience' => ['required', Rule::in(['belum', 'pernah', 'sedang'])],
            'agreement'  => ['accepted'],
        ]);

        AdoptionApplication::create([
            'animal_id'  => $animal->id,
            'user_id'    => auth()->id(),
            'full_name'  => $data['full_name'],
            'whatsapp'   => $data['whatsapp'],
            'email'      => $data['email'],
            'address'    => $data['address'],
            'reason'     => $data['reason'],
            'experience' => $data['experience'],
            'agreement'  => true,
            'status'     => 'menunggu',
        ]);

        return redirect()->route('user.applications')->with('success', 'Permohonan adopsi berhasil dikirim.');
    }
}
