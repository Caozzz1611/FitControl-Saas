<?php

use Illuminate\Support\Facades\Route;



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Landing');
});

require __DIR__.'/settings.php';
