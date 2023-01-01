<?php

namespace Michaelferreira\LaravelDisinspire\Provider;

use Illuminate\Support\ServiceProvider;
use Michaelferreira\LaravelDisinspire\Commands\DisinspireCommand;

class DisinpireServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                DisinspireCommand::class
            ]);
        }
    }
}
