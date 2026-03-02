<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TenantRequestController;

Route::get('/solicitar-acceso', [TenantRequestController::class, 'create'])->name('tenant.request');
Route::post('/solicitar-acceso', [TenantRequestController::class, 'store'])->name('tenant.request.store');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

use Illuminate\Support\Facades\Mail;

Route::get('/test-mail', function () {
    Mail::raw('Correo de prueba desde FitControl SaaS', function ($message) {
        $message->to('beritozambrano@gmail.com')
                ->subject('Prueba de correo');
    });

    return 'Correo enviado';
});


    use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Landing');
});

require __DIR__.'/settings.php';
