<?php


namespace App\Puzzle\Day11;


use App\Model\AbstractPuzzle;
use App\Model\Day11\GridCreator;

class Solution extends AbstractPuzzle
{
    /**
     * @inheritDoc
     */
    public function solution1(array $array = []): string
    {
        $gridCreator = new GridCreator($array);
        $grid = $gridCreator->getGrid();
        $grid->calculateSteps(100);

        return (string)$grid->getNumberOfFlashes();
    }

    /**
     * @inheritDoc
     */
    public function solution2(array $array = []): string
    {
        $gridCreator = new GridCreator($array);
        $grid = $gridCreator->getGrid();
        $step = $grid->calculateSteps(1000) + 1;

        return (string)$step;
    }
}