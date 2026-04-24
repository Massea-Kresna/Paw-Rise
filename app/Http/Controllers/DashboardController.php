<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Animal;
use App\Models\AdoptionRequest;

class DashboardController extends Controller
{
    public function admin()
    {
        $users = User::all();
        $animals = Animal::all();
        $requests = AdoptionRequest::all();

        return view('pages.dashboard.admin', compact('users','animals','requests'));
    }

    public function shelter()
    {
        $animals = Animal::all();
        $requests = AdoptionRequest::with(['user','animal'])->get();

        return view('pages.dashboard.shelter', compact('animals','requests'));
    }

    public function approve($id)
    {
        $req = AdoptionRequest::findOrFail($id);
        $req->status = 'approved';
        $req->save();

        return redirect()->back();
    }

    public function reject($id)
    {
        $req = AdoptionRequest::findOrFail($id);
        $req->status = 'rejected';
        $req->save();

        return redirect()->back();
    }
}