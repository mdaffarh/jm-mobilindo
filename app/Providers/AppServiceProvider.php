<?php

namespace App\Providers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Carbon::setLocale('id');

        // count pending appointments
        View::composer('*', function ($view) {
            $pendingCount = Appointment::where('status', 'pending')->count();
            $view->with('pendingAppointmentsCount', $pendingCount);
        });
    }
}
