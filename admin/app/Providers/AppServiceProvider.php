<?php

namespace App\Providers;

use App\Infra\Queries;
use App\Usecases;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Usecases\EmployeeMgr\EmployeeList\Actions\GetEmployees::class, Queries\Employee\GetEmployees::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
