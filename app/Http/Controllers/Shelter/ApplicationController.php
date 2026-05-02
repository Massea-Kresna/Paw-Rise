<?php

namespace App\Http\Controllers\Shelter;

use App\Http\Controllers\Controller;
use App\Models\AdoptionApplication;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $shelter = auth()->user()->shelter;
        abort_unless($shelter, 403);

        $query = AdoptionApplication::with(['animal', 'user'])
            ->whereHas('animal', fn($q) => $q->where('shelter_id', $shelter->id));

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $apps = $query->latest()->paginate(10)->withQueryString();
        return view('shelter.applications.index', compact('apps'));
    }

    public function show(AdoptionApplication $application)
    {
        $this->authorizeShelter($application);
        $application->load(['animal', 'user']);
        return view('shelter.applications.show', compact('application'));
    }

    public function approve(AdoptionApplication $application)
    {
        $this->authorizeShelter($application);
        $application->update(['status' => 'disetujui']);
        $application->animal->update(['status' => 'diadopsi']);
        return back()->with('success', 'Permohonan disetujui.');
    }

    public function reject(Request $request, AdoptionApplication $application)
    {
        $this->authorizeShelter($application);
        $note = $request->input('note');
        $application->update([
            'status' => 'ditolak',
            'reject_note' => $note,
        ]);
        return back()->with('success', 'Permohonan ditolak.');
    }

    private function authorizeShelter(AdoptionApplication $application): void
    {
        $shelter = auth()->user()->shelter;
        abort_unless($shelter && $application->animal->shelter_id === $shelter->id, 403);
    }
}
