<?php


namespace App\Puzzle\Day7;


use App\Model\AbstractPuzzle;

class Solution extends AbstractPuzzle
{
    /**
     * @inheritDoc
     */
    public function solution1(array $array = []): string
    {
        $splitArray = explode(',', $array[0]);
        $intArray = array_map('intval', $splitArray);
        $sumArray = [];

        $unique = array_unique($intArray);

        foreach ($unique as $key => $item) {
            $sum = 0;
            array_reduce($intArray, function ($iteration, $value) use ($intArray, $key, &$sum) {
                $sum += abs($intArray[$key] - $value);
            }, 0);
            $sumArray[] = $sum;
        }

        return (string)min($sumArray);
    }

    /**
     * @inheritDoc
     */
    public function solution2(array $array = []): string
    {
        $splitArray = explode(',', $array[0]);
        $intArray = array_map('intval', $splitArray);
        $sumArray = [];

        $unique = array_unique($intArray);

        foreach ($unique as $key => $item) {
            $sum = 0;
            array_reduce($intArray, function ($iteration, $value) use ($intArray, $key, &$sum) {
                $n = abs($intArray[$key] - $value);
                $arithmetic = $n / 2 * (1 + $n);
                $sum += $arithmetic;
            }, 0);
            $sumArray[] = $sum;
        }

        return (string)min($sumArray);
    }
}