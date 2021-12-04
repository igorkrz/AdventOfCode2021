<?php


namespace App\Model;


use App\Interfaces\PuzzleInterface;

abstract class AbstractPuzzle implements PuzzleInterface
{
    private float $ini_time = 0;

    public function __construct()
    {
        $this->ini_time = microtime(true) * 1000;
    }

    /**
     * @inheritDoc
     */
    public function read(): array
    {
        return (array)file($this->getInputFilePath(), FILE_IGNORE_NEW_LINES);
    }

    /**
     * @inheritDoc
     */
    public function write(string $string): void
    {
        echo "\nResult: \e[0;30;42m " . $string . " \e[0m\n\n";

        echo 'Time: ' . ((microtime(true) * 1000) - $this->ini_time) . "\n";
    }

    private function getInputFilePath()
    {
        $path = (string)(new \ReflectionClass($this))->getFileName();

        $name = (string)(new \ReflectionClass($this))->getShortName();

        return str_replace($name.'.php', 'input.txt', $path);
    }
}