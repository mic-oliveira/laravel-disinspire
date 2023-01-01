<?php
namespace Michaelferreira\LaravelDisinspire\Tests;

use Illuminate\Console\Application;
use Michaelferreira\LaravelDisinspire\Provider\DisinpireServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            DisinpireServiceProvider::class
        ];
    }

}
