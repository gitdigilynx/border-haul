<?php

namespace App\Providers;

use App\Enums\RoleEnum;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share role constants globally
        View::share('adminRole', RoleEnum::ADMIN->value);
        View::share('subAdminRole', RoleEnum::subAdmin->value);
        View::share('shipperRole', RoleEnum::SHIPPER->value);
        View::share('carrierRole', RoleEnum::CARRIER->value);
    }
}
