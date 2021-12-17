<?php


namespace App\Puzzle\Day5;


use App\Enum\PuzzlePartEnum;
use App\Model\AbstractPuzzle;
use App\Model\Day5\Coordinate;
use App\Model\Day5\Grid;

class Solution extends AbstractPuzzle
{
    /**
     * @inheritDoc
     */
    public function solution1(array $array = []): string
    {
        $grid = $this->prepareGrid($array);
        $grid->updateGrid(PuzzlePartEnum::FIRST);

        return (string)$grid->calculateSum();
    }

    /**
     * @inheritDoc
     */
    public function solution2(array $array = []): string
    {
        $grid = $this->prepareGrid($array);
        $grid->updateGrid(PuzzlePartEnum::SECOND);

        return (string)$grid->calculateSum();
    }

    /**
     * @param array $array
     * @return Grid
     */
    private function prepareGrid(array $array): Grid
    {
        $arrayCoordinates = [];
        $cooridnates = [];
        foreach ($array as $item) {
            preg_match_all("/\d+/m", $item, $matches);
            $coordinateValues = array_map("intval", $matches[0]);

            $arrayCoordinates[] = $coordinateValues;
            $coordinate1 = new Coordinate($coordinateValues[0], $coordinateValues[1]);
            $coordinate2 = new Coordinate($coordinateValues[2], $coordinateValues[3]);
            $cooridnates[] = [$coordinate1, $coordinate2];
        }

        $maxCoordinates = max($arrayCoordinates);
        $gridSize = max($maxCoordinates);
        $gridArray = [];
        for ($size = 0; $size <= $gridSize; $size ++) {
            $gridArray[] = array_fill(0, $gridSize + 1, 0);
        }

        return new Grid($gridArray, $cooridnates);
    }
}