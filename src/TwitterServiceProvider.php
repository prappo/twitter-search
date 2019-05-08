<?php
namespace prappo\twitter;

use Illuminate\Support\ServiceProvider;

class TwitterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'twitter');


    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/twitter.php','twitter');
    }
}