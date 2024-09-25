<?php

namespace KSolutions\VideoToThumb;

use Illuminate\Support\ServiceProvider;

class VideoToThumbServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register the VideoToThumb class
        $this->app->singleton('videotothumb', function () {
            return new VideoToThumb();
        });
    }


    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        // Boot any additional services if needed
    }
}
