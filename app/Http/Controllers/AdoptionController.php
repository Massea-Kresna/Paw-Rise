<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdoptionRequest;

class AdoptionController extends Controller
{
    public function store(Request $request, $id)
    {
        AdoptionRequest::create([
            'user_id' => 1, // sementara (belum auth)
            'animal_id' => $id,
            'reason' => $request->reason,
            'experience' => $request->experience,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Pengajuan berhasil');
    }
}