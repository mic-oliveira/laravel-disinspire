<?php

namespace Unit;

use Michaelferreira\FailureCoach\QuoteGenerator;
use Michaelferreira\FailureCoach\Quotes;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;


/**
 * @covers
 */
class QuoteGeneratorTest extends TestCase
{
    public function test_generate_random_quote()
    {
        $quotes = new Quotes();
        $quotes->setQuotes(['Wisdom quote of failure.']);
        $quote = new QuoteGenerator($quotes);
        $this->assertIsString($quote->wisdomQuote());
    }

    public function test_can_get_specific_quote()
    {
        $quotesFromFile = json_decode(file_get_contents(__DIR__.'/quotes_file.json'), true)['quotes'];
        $quotes = new Quotes();
        $quotes->setQuotes($quotesFromFile);
        $quote = new QuoteGenerator($quotes);
        $this->assertEquals('Nunca foi azar, sempre foi incompetência.', $quote->wisdomQuote(0));
        $this->assertEquals('Você é o maior problema das suas soluções.', $quote->wisdomQuote(2));
    }

    public function test_should_throw_type_error()
    {
        $quote = new QuoteGenerator(new Quotes());
        $this->expectException(\Throwable::class);
        $quote->wisdomQuote(99);
    }

    public function test_should_change_language_and_load_from_i18n()
    {
        $quote = new QuoteGenerator(new Quotes());
        assertEquals('It was never bad luck, it was always incompetence.', $quote->setLang('en')->wisdomQuote(0));
        assertEquals('It was never bad luck, it was always incompetence.', $quote->wisdomQuote(0, "en"));
    }
}
