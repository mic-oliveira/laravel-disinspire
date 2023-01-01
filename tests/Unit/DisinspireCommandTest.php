<?php

namespace Michaelferreira\LaravelDisinspire\Tests\Unit;

use Michaelferreira\LaravelDisinspire\Commands\DisinspireCommand;
use Michaelferreira\LaravelDisinspire\Tests\TestCase;

class DisinspireCommandTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_get_quote()
    {
        self::assertIsString(DisinspireCommand::getWisdomQuote());
        self::assertEquals('Nunca foi azar, sempre foi incompetência.', DisinspireCommand::getWisdomQuote(0));
    }

    public function test_command_exec()
    {
        $this->artisan(DisinspireCommand::class, ['--quote' => 0])->assertSuccessful()->run();
    }

    public function test_command_throw_not_exist_quote()
    {
        $this->expectException(\Exception::class);
        $this->artisan(DisinspireCommand::class, ['--quote' => 999])->run();
    }

}
