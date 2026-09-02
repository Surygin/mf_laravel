<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Requisite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Шарим переменные для всех view
        View::share('contacts', Contact::first());
        View::share('requisites', Requisite::first());
    }
}
