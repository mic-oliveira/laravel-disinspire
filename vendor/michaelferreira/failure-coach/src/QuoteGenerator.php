<?php

namespace Michaelferreira\FailureCoach;

use Exception;
use Michaelferreira\FailureCoach\Interfaces\QuoteInterface;

class QuoteGenerator
{
    private string $lang;

    private QuoteInterface $quote;

    public function __construct(QuoteInterface $quote)
    {
        $this->quote = $quote;
    }

    /**
     * @throws Exception
     */
    public function setLang(string $lang = null): QuoteGenerator
    {
        switch ($lang) {
            case 'pt':
            case 'pt-br': $this->lang = 'pt-br';
            break;
            case 'en-us';
            case 'en': $this->lang = 'en';
            break;
            default: throw new Exception('Language not implemented.');
        }
        $this->loadQuotes();
        return $this;
    }

    protected function loadQuotes()
    {
        $lang = $this->lang ?? 'pt-br';
        if (!file_exists(__DIR__.'/I18n/'.$lang.'.json')) {
            throw new Exception("Quote file not found.");
        }
        $quotes = json_decode(file_get_contents(__DIR__.'/I18n/'.$lang.'.json'), true)['quotes'];
        $this->quote->setQuotes($quotes);
    }

    /**
     * @throws Exception
     */
    public function wisdomQuote(int $index = null, string $lang = 'pt'): string
    {
        if (empty($this->lang)) {
            $this->setLang($lang);
        }
        if ($index > count($this->quote->getQuotes())) {
            throw new Exception("Quote not exists");
        }
        if (is_null($index)) {
            return $this->quote->getQuote();
        }
        return $this->quote->getQuotes()[$index];
    }
}
