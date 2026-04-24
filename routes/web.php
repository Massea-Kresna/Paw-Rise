<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdoptionController;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/animals', [AnimalController::class, 'index']);
Route::get('/animals/{id}', [AnimalController::class, 'show']);

Route::post('/adopt/{id}', [AdoptionController::class, 'store']);

Route::get('/dashboard/admin', [DashboardController::class, 'admin']);
Route::get('/dashboard/shelter', [DashboardController::class, 'shelter']);

Route::get('/approve/{id}', [DashboardController::class, 'approve']);
Route::get('/reject/{id}', [DashboardController::class, 'reject']);