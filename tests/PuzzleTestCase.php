<?php


namespace App\Tests;


use PHPUnit\Framework\TestCase;

abstract class PuzzleTestCase extends TestCase
{
    public function read(): array
    {
        return (array)file($this->getInputFilePath(), FILE_IGNORE_NEW_LINES);
    }

    private function getInputFilePath()
    {
        $path = (string)(new \ReflectionClass($this))->getFileName();

        $name = (string)(new \ReflectionClass($this))->getShortName();

        return str_replace($name.'.php', 'testInput.txt', $path);
    }
}