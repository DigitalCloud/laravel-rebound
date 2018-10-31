<?php

namespace DigitalCloud\LaravelRebound;

use Illuminate\Support\ServiceProvider;
use Illuminate\Queue\CallQueuedHandler;

class LaravelReboundServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/rebound.php.php' => config_path('rebound.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind(CallQueuedHandler::class, \DigitalCloud\LaravelRebound\CallQueuedHandler::class);

        $this->mergeConfigFrom((file_exists(config_path('rebound.php'))) ?
            config_path('rebound.php') :
            __DIR__ . '/../config/rebound.php', 'queue.connections'
        );
    }
}
