<?php


namespace App\Puzzle\Day17;


use App\Model\AbstractPuzzle;
use App\Model\Day17\Probe;
use App\Model\Day17\Target;

class Solution extends AbstractPuzzle
{
    /**
     * @inheritDoc
     */
    public function solution1(array $array = []): string
    {
        $target = new Target($array);
        $probe = new Probe($target);

        return (string)$probe->getHighestY();
    }

    /**
     * @inheritDoc
     */
    public function solution2(array $array = []): string
    {
        $target = new Target($array);
        $probe = new Probe($target);

        return (string)$probe->calculateDifferentPoints();
    }
}