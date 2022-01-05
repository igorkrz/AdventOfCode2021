<?php


namespace App\Puzzle\Day15;


use App\Enum\PuzzlePartEnum;
use App\Model\AbstractPuzzle;
use App\Model\Day15\Dijkstra;

class Solution extends AbstractPuzzle
{
    /**
     * @inheritDoc
     */
    public function solution1(array $array = []): string
    {
        $alg = new Dijkstra($array, PuzzlePartEnum::FIRST);

        return (string)$alg->getShortestPath();
    }

    /**
     * @inheritDoc
     */
    public function solution2(array $array = []): string
    {
        $alg = new Dijkstra($array, PuzzlePartEnum::SECOND);

        return (string)$alg->getShortestPath();
    }
}