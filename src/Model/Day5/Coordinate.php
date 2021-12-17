<?php

namespace App\Model\Day5;

use App\Enum\PuzzlePartEnum;
use PHPUnit\Util\Exception;

class Coordinate
{
    private int $x;

    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @param Coordinate $coordinate
     * @param int $puzzlePart
     * @return Coordinate[]
     */
    public function diff(Coordinate $coordinate, int $puzzlePart): array
    {
        switch ($puzzlePart) {
            case PuzzlePartEnum::SECOND:
                if ($this->isHorizontal($coordinate)) {
                    return $this->calcHorizontal($coordinate);
                }
                else if ($this->isVertical($coordinate)) {
                    return $this->calcVertical($coordinate);
                }
                else {
                    return $this->calcDiagonal($coordinate);
                }

            case PuzzlePartEnum::FIRST:
                if ($this->isHorizontal($coordinate)) {
                    return $this->calcHorizontal($coordinate);
                }
                else if ($this->isVertical($coordinate)) {
                    return $this->calcVertical($coordinate);
                }

                return[];

            default:
                throw new Exception("Wrong puzzle part");
        }
    }

    /**
     * @param Coordinate $coordinate
     * @return array
     */
    private function calcHorizontal(Coordinate $coordinate): array
    {
        $y = $coordinate->getY();

        $x = $coordinate->getX();

        $newCoordinates[] = new Coordinate($x, $y);

        while ($this->getY() !== $y) {
            $y = $y >= $this->getY() ? $y - 1 : $y + 1;

            $newCoordinates[] = new Coordinate($x, $y);
        }

        return $newCoordinates;
    }

    /**
     * @param Coordinate $coordinate
     * @return array
     */
    private function calcVertical(Coordinate $coordinate): array
    {
        $y = $coordinate->getY();

        $x = $coordinate->getX();

        $newCoordinates[] = new Coordinate($x, $y);

        while ($this->getX() !== $x) {
            $x = $x >= $this->getX() ? $x - 1 : $x + 1;

            $newCoordinates[] = new Coordinate($x, $y);
        }

        return $newCoordinates;
    }

    /**
     * @param Coordinate $coordinate
     * @return array
     */
    private function calcDiagonal(Coordinate $coordinate): array
    {
        $y = $coordinate->getY();

        $x = $coordinate->getX();

        $newCoordinates[] = new Coordinate($x, $y);

        while ($this->getX() !== $x) {
            $y = $y >= $this->getY() ? $y - 1 : $y + 1;
            $x = $x >= $this->getX() ? $x - 1 : $x + 1;

            $newCoordinates[] = new Coordinate($x, $y);
        }

        return $newCoordinates;
    }

    /**
     * @param Coordinate $coordinate
     * @return bool
     */
    private function isHorizontal(Coordinate $coordinate): bool
    {
        return $this->getX() === $coordinate->getX();
    }

    /**
     * @param Coordinate $coordinate
     * @return bool
     */
    private function isVertical(Coordinate $coordinate): bool
    {
        return $this->getY() === $coordinate->getY();
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }
}