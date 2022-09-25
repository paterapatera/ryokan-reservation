<?php

namespace App\Providers;

use App\Infra\Queries;
use App\Infra\Repositories;
use App\Usecases;
use App\Domains;
use App\Infra\Shared;
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
        $this->app->singleton(Domains\Employee\Repository::class, Repositories\Employee\EloquentRepository::class);
        $this->app->singleton(Domains\Shared\IdGenerator::class, Shared\IdGenerator::class);
        $this->app->singleton(Domains\Shared\Hasher::class, Shared\Hasher::class);
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
