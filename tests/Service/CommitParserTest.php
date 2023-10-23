<?php

namespace App\Tests\Service;

use App\Service\CommitParser;
use PHPUnit\Framework\TestCase;

class CommitParserTest extends TestCase
{
    public function test()
    {
        $parse = new CommitParser();
        $message = '[add] [feature] @core #123456 Integrovat Premier: export objednávek
        * Export objednávek cronem co hodinu.
        * Export probíhá v dávkách.
        * ...
        BC: Refaktorovaný BaseImporter.
        BC: ...
        Feature: Nový logger.
        TODO: Refactoring autoemail modulu';

        $parsedMessage = $parse->parse($message);

        $this->assertEquals('Integrovat Premier: export objednávek', $parsedMessage->getTitle());
        $this->assertEquals(123456, $parsedMessage->getTaskId());
        $this->assertEquals(['[add]', '[feature]'], $parsedMessage->getTags());
        $this->assertEquals(['* Export objednávek cronem co hodinu.', '* Export probíhá v dávkách.', '* ...'], $parsedMessage->getDetails());
        $this->assertEquals(['BC: Refaktorovaný BaseImporter.', 'BC: ...'], $parsedMessage->getBcBreaks());
        $this->assertEquals(['TODO: Refactoring autoemail modulu'], $parsedMessage->getTodos());

        echo $parsedMessage->getTitle();
        echo $parsedMessage->getTaskId();
        var_dump($parsedMessage->getTags());
        var_dump($parsedMessage->getDetails());
        var_dump($parsedMessage->getBcBreaks());
        var_dump($parsedMessage->getTodos());
    }
}