<?php

namespace Michaelferreira\FailureCoach\Interfaces;

interface QuoteInterface
{
    public function setQuotes(array $quotes);

    public function getQuote(): string;

    public function getQuotes(): array;

    public function hasIndex(int $index);
}
