<?php
namespace prappo\twitter;

use Illuminate\Support\ServiceProvider;

class TwitterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'twitter');
        $this->publishes([
            __DIR__ . '/config/twitter.php' => config_path('twitter-search.php')
        ], 'twitter-search');


    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/twitter.php', 'twitter');
    }
}