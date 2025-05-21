<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');

            // Redirect www to non-www
            if (Request::getHost() === 'www.phatrade-eg.com') {
                $uri = Request::getRequestUri();
                header("Location: https://phatrade-eg.com$uri", true, 301);
                exit();
            }
        }
    }
}
