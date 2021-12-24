<?php

namespace App\Model\Day8;

use function PHPUnit\Framework\isEmpty;

class Display
{
    /**
     * @var string[]
     */
    private array $digits;

    /**
     * @var string[]
     */
    private array $signals;

    public function __construct(array $digits, array $signals)
    {
        $this->digits = $digits;
        $this->signals = $signals;
    }

    /**
     * Part of the solution for the second part of the puzzle<br>
     * Decodes the signals and returns the Signal object
     *
     * @return Signal
     */
    public function decodeSignals(): Signal
    {
        $signalObj = new Signal();
        $helper = [];

        foreach ($this->signals as $signal) {
            $signalArray = str_split($signal);
            $length = count($signalArray);
            sort($signalArray);

            $key = [
                2 => 1,
                3 => 7,
                4 => 4,
                7 => 8
            ];

            if (isset($key[$length])) {
                $helper[$key[$length]] = $signalArray;
            }
           $signalObj->addSignals($signalArray);
        }

        foreach ($signalObj->getSignals() as $signal) {
            $length = count($signal);

            if (!in_array($signal, $helper)) {
                if ($length === 5 && count(array_diff($helper[1], $signal)) === 0) {
                    $helper[3] = $signal;
                }
                elseif ($length === 6) {
                    if (count(array_diff($helper[1], $signal)) === 1) {
                        $helper[6] = $signal;
                    }
                    elseif (count(array_diff($helper[4], $signal)) === 1) {
                        $helper[0] = $signal;
                    }
                    elseif (count(array_diff($helper[4], $signal)) === 0) {
                        $helper[9] = $signal;
                    }
                }
            }
        }

        $diffEightAndNine = array_diff($helper[8], $helper[9]);
        $diffEightAndNine = array_pop($diffEightAndNine);

        foreach ($signalObj->getSignals() as $signal) {
            $length = count($signal);
            if ($length === 5 && !in_array($signal, $helper)) {
                if (in_array($diffEightAndNine, $signal)) {
                    $helper[2] = $signal;
                }
                else {
                    $helper[5] = $signal;
                }
            }
        }

        $signalObj->setDecodedSignals($helper);

        return $signalObj;
    }

    /**
     * Solution for part one
     *
     * @return int
     */
    public function findDigits(): int
    {
        $solution = 0;

        foreach ($this->digits as $digit) {
            $uniqueCharacters = count_chars($digit, 3);
            $length = strlen($uniqueCharacters);

            if ($length === 2 || $length === 3 || $length === 4 || $length === 7) {
                $solution += 1;
            }
        }

        return $solution;
    }
}