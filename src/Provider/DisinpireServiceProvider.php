<?php

namespace Michaelferreira\LaravelDisinspire\Provider;

use Illuminate\Support\ServiceProvider;
use Michaelferreira\LaravelDisinspire\Commands\DisinspireCommand;

class DisinpireServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'../../config/failure-coach.php',config_path('failure-coach')
        ]);
        $this->commands([
            DisinspireCommand::class
        ]);
    }
}
