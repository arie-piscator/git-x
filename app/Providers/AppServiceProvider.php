<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\Contracts\Services\Api\Git\GitProjectServiceInterface',
            'App\Services\Api\GitHub\GitHubProjectApi'
        );

        $this->app->bind(
            'App\Contracts\Support\HttpClientInterface',
            'App\Support\HttpClient'
        );
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
