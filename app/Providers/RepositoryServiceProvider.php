<?php

namespace App\Providers;

use App\Models\SystemAccess;
use App\Repositories\Contracts\RoleAccessContract;
use App\Repositories\Contracts\RoleContract;
use App\Repositories\Contracts\SystemAccessContract;
use App\Repositories\Contracts\SystemContract;
use App\Repositories\Contracts\UserContract;
use App\Repositories\RoleAccessRepository;
use App\Repositories\RoleRepository;
use App\Repositories\SystemAccessRepository;
use App\Repositories\SystemRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserContract::class,
            UserRepository::class
        );
        $this->app->bind(
            SystemContract::class,
            SystemRepository::class
        );
        $this->app->bind(
            SystemAccessContract::class,
            SystemAccessRepository::class
        );
        $this->app->bind(
            RoleContract::class,
            RoleRepository::class
        );
        $this->app->bind(
            RoleAccessContract::class,
            RoleAccessRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
