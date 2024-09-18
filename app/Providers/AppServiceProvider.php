<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\Staff;
use App\Models\Department;
use App\Models\User;
use App\Observers\CustomerObserver;
use App\Observers\UserObserver;
use App\Observers\DepartmentObserver;
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
        Department::observe(DepartmentObserver::class);
        Staff::observe(UserObserver::class);
        User::observe(UserObserver::class);
        Customer::observe(CustomerObserver::class);
    }
}
