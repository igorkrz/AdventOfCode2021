<?php

namespace App\Model\Day8;

class Signal
{
    /**
     * @var array<array<string>>
     */
    private array $signals;

    /**
     * @var array<array<string>>
     */
    private array $decodedSignals;

    /**
     * Returns the number after the signals have been decoded
     *
     * @param array<array<string>> $digits
     * @return int
     */
    public function decodeDigits(array $digits): int
    {
        $number = '';

        foreach ($digits as $digit) {
            $digitArray = str_split($digit);
            sort($digitArray);

            foreach ($this->decodedSignals as $key => $decodedSignal) {
                if ($decodedSignal === $digitArray) {
                    $number .= $key;
                }
            }
        }

        return (int)$number;
    }

    /**
     * @return array<array<string>>
     */
    public function getSignals(): array
    {
        return $this->signals;
    }

    /**
     * @param string[] $signals
     */
    public function addSignals(array $signals): void
    {
        $this->signals[] = $signals;
    }

    /**
     * @param array<array<string>> $decodedSignals
     */
    public function setDecodedSignals(array $decodedSignals): void
    {
        $this->decodedSignals = $decodedSignals;
    }
}