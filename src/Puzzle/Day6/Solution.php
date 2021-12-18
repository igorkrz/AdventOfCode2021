<?php


namespace App\Puzzle\Day6;


use App\Model\AbstractPuzzle;

class Solution extends AbstractPuzzle
{
    /**
     * @inheritDoc
     */
    public function solution1(array $array = [], int $numberOfDays = 0): string
    {
        $splitArray = explode(',', $array[0]);
        $intArray = array_map('intval', $splitArray);
        $numberOfDays = $numberOfDays ?? 80;
        $currentDay = 0;

        while ($currentDay != $numberOfDays) {
            $counter = 0;
            array_walk($intArray, function ($value, $key) use (&$intArray, &$counter) {
                if ($value !== 0) {
                    $intArray[$key] -= 1;
                }
                else {
                    $intArray[] = 9;
                    $intArray[$key] = 6;
                }
            });
            $currentDay += 1;
        }

        return (string)count($intArray);
    }

    /**
     * @inheritDoc
     */
    public function solution2(array $array = [], int $numberOfDays = 0): string
    {
        $splitArray = explode(',', $array[0]);
        $intArray = array_map('intval', $splitArray);

        $lanternFish = array_fill(0, 9, 0);

        foreach ($intArray as $age) {
            $lanternFish[$age]++;
        }

        for ($day = 0; $day < $numberOfDays; $day++) {
            $lanternFish = [
                0 => $lanternFish[1],
                1 => $lanternFish[2],
                2 => $lanternFish[3],
                3 => $lanternFish[4],
                4 => $lanternFish[5],
                5 => $lanternFish[6],
                6 => $lanternFish[7] + $lanternFish[0],
                7 => $lanternFish[8],
                8 => $lanternFish[0],
            ];
        }

        return (string)array_sum($lanternFish);
    }
}