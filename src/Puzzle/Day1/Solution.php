<?php


namespace App\Puzzle\Day1;


use App\Model\AbstractPuzzle;

class Solution extends AbstractPuzzle
{
    public function solution1(array $array = []): string
    {
        $counter = 1;
        $result = 0;
        $numberOfItemsInArray = count($array);

        foreach ($array as $item) {
            if ($counter < $numberOfItemsInArray && $array[$counter] > $item) {
                $result ++;
            }
            $counter += 1;
        }

        return $result;
    }

    public function solution2(array $array = []): string
    {
        $counter = 0;
        $result = 0;
        $numberOfItemsInArray = count($array);

        foreach ($array as $item) {
            if ($counter + 3 < $numberOfItemsInArray) {
                $sum1 = $array[$counter] + $array[$counter + 1] + $array[$counter + 2];
                $sum2 = $array[$counter + 1] + $array[$counter + 2] + $array[$counter + 3];

                if ($sum2 > $sum1) {
                    $result ++;
                }
            }

            $counter += 1;
        }

        return $result;
    }
}