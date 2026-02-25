<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Actions\CreateAction; // ✅ ESTE es el correcto en v3

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        CreateAction::configureUsing(function (CreateAction $action) {
            $action->label('Nuevo');
        });
    }
}