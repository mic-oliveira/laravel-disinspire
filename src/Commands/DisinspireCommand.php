<?php

namespace Michaelferreira\LaravelDisinspire\Commands;

use Illuminate\Console\Command;
use Michaelferreira\FailureCoach\QuoteGenerator;
use Michaelferreira\FailureCoach\Quotes;

class DisinspireCommand extends Command
{
    protected $signature = "disinspire {--quote=null} {--language=pt}";

    protected $description = "Wisdom quotes from failure coach.";

    public function handle()
    {
        $lang = $this->option('language');
        $quote = $this->option('quote') != 'null' ? $this->option('quote') : null;
        return self::formatConsole($this->getWisdomQuote($quote, $lang));
    }

    public function getWisdomQuote($index, $lang): string
    {
        $quotes = new QuoteGenerator(new Quotes());
        return $quotes->wisdomQuote($index, $lang);
    }
    public static function formatConsole(string $quote)
    {
        return sprintf(
            "\n  <options=bold>“ %s ”</>\n  <fg=gray>— Coach de Fracassos</>\n", $quote);
    }

}
