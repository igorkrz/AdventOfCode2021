<?php


namespace App\Puzzle\Day13;


use App\Enum\PuzzlePartEnum;
use App\Model\AbstractPuzzle;
use App\Model\Day13\Fold;
use App\Model\Day13\Point;

class Solution extends AbstractPuzzle
{
    /**
     * @inheritDoc
     */
    public function solution1(array $array = []): string
    {
        $fold = $this->createFold($array);
        $fold->fold(PuzzlePartEnum::FIRST);

        return (string)$fold->getSolution();
    }

    /**
     * @inheritDoc
     */
    public function solution2(array $array = []): string
    {
        $fold = $this->createFold($array);
        $fold->fold(PuzzlePartEnum::SECOND);
        //$fold->printFold();

        return (string)$fold->getSolution();
    }

    /**
     * @param array $array
     * @return Fold
     */
    private function createFold(array $array): Fold
    {
        $fold = new Fold();

        foreach ($array as $item) {
            if ($item !== "" && str_contains($item, 'fold')) {
                $split = explode('=', $item);
                $axis = substr($split[0], -1);

                $point = $axis === 'x' ? new Point((int)$split[1], 0) : new Point(0, (int)$split[1]);

                $fold->addFoldInstructions($point);
            }
            elseif ($item !== "" && !str_contains($item, 'fold')) {
                $split = explode(',', $item);
                $point = new Point((int)$split[0], (int)$split[1]);
                $fold->addPoint($point);
            }
        }

        $width = max(array_map(fn ($point) => $point->getX(), $fold->getPoints()));
        $height = max(array_map(fn ($point) => $point->getY(), $fold->getPoints()));

        $fold->setWidth($width);
        $fold->setHeight($height);

        return $fold;
    }
}