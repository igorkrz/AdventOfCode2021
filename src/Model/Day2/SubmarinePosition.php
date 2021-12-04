<?php


namespace App\Model\Day2;


use App\Enum\Day2\SubmarineDirection;

class SubmarinePosition
{
    private int $horizontalPosition = 0;

    private int $depth = 0;

    private int $aim = 0;

    /**
     * @param string $direction
     * @param int $distance
     */
    public function calculatePositionPartOne(string $direction, int $distance): void
    {
        switch ($direction) {
            case SubmarineDirection::FORWARD:
                $this->horizontalPosition += $distance;
                break;
            case SubmarineDirection::UP:
                $this->depth -= $distance;
                break;
            case SubmarineDirection::DOWN:
                $this->depth += $distance;
                break;
            default:
                break;
        }
    }

    /**
     * @param string $direction
     * @param int $distance
     */
    public function calculatePositionPartTwo(string $direction, int $distance): void
    {
        switch ($direction) {
            case SubmarineDirection::FORWARD:
                $this->horizontalPosition += $distance;
                $this->depth += $this->aim * $distance;
                break;
            case SubmarineDirection::UP:
                $this->aim -= $distance;
                break;
            case SubmarineDirection::DOWN:
                $this->aim += $distance;
                break;
            default:
                break;
        }
    }

    /**
     * @return array
     */
    public function getCurrentPosition(): array
    {
        return [
            "horizontal" => $this->horizontalPosition,
            "depth" => $this->depth,
            "aim" => $this->aim
        ];
    }

    /**
     * @return int
     */
    public function multiplyPosition(): int
    {
        return $this->horizontalPosition * $this->depth;
    }
}