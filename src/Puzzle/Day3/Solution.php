<?php


namespace App\Puzzle\Day3;


use App\Enum\Day3\Rating;
use App\Model\AbstractPuzzle;

class Solution extends AbstractPuzzle
{
    public function solution1(array $array = []): string
    {
        $stringLength = strlen($array[0]);
        $resultArray = [];
        $gamma = '';
        $epsilon = '';

        foreach ($array as $item) {
            for ($number = 0; $number < $stringLength; $number ++) {
                $resultArray[$number][] = substr($item, $number, 1);
            }
        }
        foreach ($resultArray as $item) {
            $values = array_count_values($item);
            if ($values[0] > $values[1]) {
                $gamma .= "0";
                $epsilon .= "1";
            }
            else {
                $gamma .= "1";
                $epsilon .= "0";
            }
        }

        return (string)(bindec($gamma) * bindec($epsilon));
    }

    public function solution2(array $array = []): string
    {
        $oxygenGeneratorRating = $this->recursiveSolution($array, Rating::OXYGEN_GENERATOR);

        $scrubberCO2Rating = $this->recursiveSolution($array, Rating::SCRUBBER_CO2);

        return (string)(bindec($oxygenGeneratorRating) * bindec($scrubberCO2Rating));
    }

    public function recursiveSolution(array $array, int $rating, int $index = 0): string
    {
        if (count($array) == 1) {
            return $array[0];
        }

        $column = [];
        $resultArray = [];

        foreach ($array as $item) {
            $column[$index][] = substr($item, $index, 1);
        }

        $result = array_count_values($column[$index]);

        if ($rating == Rating::OXYGEN_GENERATOR) {
            $keys = $this->filterForOxygenRating($column, $index, $result);
        }
        else {
            $keys = $this->filterForCo2ScrubberRating($column, $index, $result);
        }


        foreach ($keys as $key) {
            $resultArray[] = $array[$key];
        }

        return $this->recursiveSolution($resultArray, $rating, ++$index);
    }

    public function filterBit1(array $array, int $index): array
    {
        return array_keys(array_filter($array[$index], function ($el) {
            return $el == "1";
        }));
    }

    public function filterBit0(array $array, int $index): array
    {
        return array_keys(array_filter($array[$index], function ($el) {
            return $el == "0";
        }));
    }

    public function filterForOxygenRating(array $array, int $index, array $result)
    {
        if (count($result) == 1 || $result[0] > $result[1]) {
            if (array_key_first($result) == 0 || $result[0] > $result[1]) {
                return $this->filterBit0($array, $index);
            }
            else {
                return $this->filterBit1($array, $index);
            }
        }

        return $this->filterBit1($array, $index);
    }

    public function filterForCo2ScrubberRating(array $array, int $index, array $result)
    {
        if (count($result) == 1 || $result[0] > $result[1]) {
            if (array_key_first($result) == 1 || $result[0] > $result[1]) {
                return $this->filterBit1($array, $index);
            }
            else {
                return $this->filterBit0($array, $index);
            }
        }

        return $this->filterBit0($array, $index);
    }
}