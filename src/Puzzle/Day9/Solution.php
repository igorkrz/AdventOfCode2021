<?php


namespace App\Puzzle\Day9;


use App\Model\AbstractPuzzle;
use App\Model\Day9\Grid;
use App\Model\Day9\Point;

class Solution extends AbstractPuzzle
{
    /**
     * @inheritDoc
     */
    public function solution1(array $array = []): string
    {
        $lowestPoints = $this->createGrid($array)->getLowestPoints();
        $sum = 0;

        array_walk_recursive($lowestPoints, function ($point) use (&$sum) {
            $sum += $point->getValue() + 1;
        });

        return (string) $sum;
    }

    /**
     * @inheritDoc
     */
    public function solution2(array $array = []): string
    {
        $grid = $this->createGrid($array);

        foreach ($grid->getLowestPoints() as $lowestPoint) {
            $basin[] = $grid->checkConsecutive($lowestPoint);
        }

        rsort($basin);
        $maxValues = array_slice($basin, 0, 3);

        $result = array_reduce($maxValues, function ($initial, $value) {
            return $initial * $value;
        }, 1);

        return (string) $result;
    }

    /**
     * @param array $array
     * @return Grid
     */
    private function createGrid(array $array): Grid
    {
        $grid = new Grid();
        $length = strlen($array[0]) - 1;

        foreach ($array as $rowKey => $arrayValue) {
            $split = str_split($arrayValue);

            foreach ($split as $columnKey => $value) {
                $point = new Point($value, $columnKey, $rowKey);

                $up = null;
                $down = null;

                if (isset($array[$rowKey - 1][$columnKey])) {
                    $upValue = (int)$array[$rowKey - 1][$columnKey];
                    $up = new Point($upValue, $columnKey, $rowKey - 1);
                }
                if (isset($array[$rowKey + 1][$columnKey])) {
                    $downValue = (int)$array[$rowKey + 1][$columnKey];
                    $down = new Point($downValue, $columnKey, $rowKey + 1);
                }

                $point->setUp($up);
                $point->setDown($down);

                if ($point->isLeftEdge()) {
                    $point->setPrev(null);
                    $next = new Point(next($split), $columnKey + 1, $rowKey);
                    $point->setNext($next);
                    if ($point->getValue() < $point->getNext()->getValue() && $point->isLowestPoint()) {
                        $grid->addLowestPoint($point);
                    }
                } elseif ($point->isRightEdge($length)) {
                    $point->setNext(null);
                    $prev = new Point(prev($split), $columnKey - 1, $rowKey);
                    $point->setPrev($prev);
                    if ($point->getValue() < $point->getPrev()->getValue() && $point->isLowestPoint()) {
                        $grid->addLowestPoint($point);
                    }
                } else {
                    $prev = new Point(prev($split), $columnKey - 1, $rowKey);
                    $point->setPrev($prev);
                    $currentValue = next($split);
                    $next = new Point(next($split), $columnKey + 1, $rowKey);
                    $point->setNext($next);

                    if ($point->getValue() < $point->getPrev()->getValue() &&
                        $point->getValue() < $point->getNext()->getValue() &&
                        $point->isLowestPoint()) {
                        $grid->addLowestPoint($point);
                    }
                }
                $grid->addPoint($point);
            }
        }

        return $grid;
    }
}