<?php


namespace App\Puzzle\Day10;


use App\Model\AbstractPuzzle;
use App\Model\Day10\Syntax;

class Solution extends AbstractPuzzle
{
    /**
     * @inheritDoc
     */
    public function solution1(array $array = []): string
    {
        $syntax = new Syntax();

        foreach ($array as $item) {
            $syntax->checkCorrupted($item);
        }

        return (string)$syntax->getCorruptedScore();
    }

    /**
     * @inheritDoc
     */
    public function solution2(array $array = []): string
    {
        $syntax = new Syntax();

        foreach ($array as $item) {
            $syntax->checkIncomplete($item);
        }

        return (string)$syntax->getMiddleScore();
    }
}