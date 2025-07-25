<?php

use App\Http\Controllers\Admin\LogementController;
use App\Http\Controllers\MaisonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// La page welcome
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
// La routes des contacts
Route::get('/contacts', function () {
    return view('contacts.contact');
})->name('contact');
// la routes des agents
Route::get('/agents', function () {
    return view('contacts.agent');
})->name('agent');
// la route des services
Route::get('/services', function () {
    return view('contacts.service');
})->name('service');
// la route des terms
Route::get('/terms', function () {
    return view('contacts.terms');
})->name('terms');
// La route pour les proprietes
Route::get('/logements', [MaisonController::class, 'index'])->name('maison');
// show details
Route::get('/logements/{id}', [MaisonController::class, 'show'])->name('logements.show');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Exemple de route ressource pour gérer les logements
    Route::resource('logements', LogementController::class);
    Route::get('admin/logements/{logement}', [LogementController::class, 'show'])->name('logements.show');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
