<?php


namespace App\Puzzle\Day2;


use App\Enum\PuzzlePartEnum;
use App\Model\AbstractPuzzle;
use App\Model\Day2\SubmarinePosition;

class Solution extends AbstractPuzzle
{
    public function solution1(array $array = []): string
    {
        return $this->getResult(PuzzlePartEnum::FIRST, $array);
    }

    public function solution2(array $array = []): string
    {
        return $this->getResult(PuzzlePartEnum::SECOND, $array);
    }

    public function getResult(int $puzzlePart, array $array = []): string
    {
        $submarinePosition = new SubmarinePosition();

        foreach ($array as $item) {
            $submarineInfo = explode(" ", $item);
            $direction = $submarineInfo[0];
            $distance = $submarineInfo[1];

            switch ($puzzlePart) {
                case PuzzlePartEnum::FIRST:
                    $submarinePosition->calculatePositionPartOne($direction, $distance);
                    break;
                case PuzzlePartEnum::SECOND:
                    $submarinePosition->calculatePositionPartTwo($direction, $distance);
                    break;
            }
        }

        return (string)$submarinePosition->multiplyPosition();
    }
}