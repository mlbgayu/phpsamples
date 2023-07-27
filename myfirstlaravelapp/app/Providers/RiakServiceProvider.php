<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Riak\Connection;
use Illuminate\Contracts\Foundation\Application;


class RiakServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Connection::class, function (Application $app) {
            return new Connection(config('riak'));
        });
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
