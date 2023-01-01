<?php

namespace Michaelferreira\FailureCoach;

use Exception;
use Michaelferreira\FailureCoach\Interfaces\QuoteInterface;

class Quotes implements QuoteInterface
{
    protected $quotes = [];

    public function setQuotes(array $quotes): Quotes
    {
        $this->quotes = $quotes;
        return $this;
    }

    /**
     * @throws Exception
     */
    public function getQuote(): string
    {
        if (empty($this->quotes)) {
            throw new Exception('Has no quotes');
        }
        return $this->quotes[random_int(0, count($this->quotes) - 1)];

    }

    /**
     * @throws Exception
     */
    public function getQuotes(): array
    {
        if (empty($this->quotes)) {
            throw new Exception('Has no quotes');
        }
        return $this->quotes;
    }

    public function hasIndex(int $index): bool
    {
        return $index < count($this->quotes) && $index >=0;
    }


}
