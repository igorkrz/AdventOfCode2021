<?php


namespace App\Puzzle\Day8;


use App\Model\AbstractPuzzle;
use App\Model\Day8\Display;

class Solution extends AbstractPuzzle
{
    /**
     * @inheritDoc
     */
    public function solution1(array $array = []): string
    {
        $sum = 0;
        foreach ($array as $item) {
            $digits = [];
            preg_match_all("/[a-z]+/", $item, $signals);
            for ($i = 10; $i <= 13; $i ++) {
                $digits[] = array_pop($signals[0]);
            }

            $display = new Display($digits, $signals[0]);
            $sum += $display->findDigits();
        }

        return (string)$sum;
    }

    /**
     * @inheritDoc
     */
    public function solution2(array $array = []): string
    {
        $sum = 0;
        foreach ($array as $item) {
            $digits = [];

            preg_match_all("/[a-z]+/", $item, $signals);
            for ($i = 10; $i <= 13; $i ++) {
                $digits[] = array_pop($signals[0]);
            }

            $digits = array_reverse($digits);
            $display = new Display($digits, $signals[0]);

            $sum += $display->decodeSignals()->decodeDigits($digits);
        }

        return (string)$sum;
    }
}