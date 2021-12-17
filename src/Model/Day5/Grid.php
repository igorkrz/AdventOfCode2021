<?php

namespace App\Model\Day5;

class Grid
{
    /**
     * @var int[][]
     */
    private array $grid;

    /**
     * @var Coordinate[]
     */
    private array $coordinates;

    public function __construct(array $grid, array $coordinates)
    {
        $this->grid = $grid;
        $this->coordinates = $coordinates;
    }

    /**
     * @param int $puzzlePart
     * @return void
     */
    public function updateGrid(int $puzzlePart): void
    {
        foreach ($this->coordinates as $coordinates) {
            $coordinate1 = $coordinates[0];
            $coordinate2 = $coordinates[1];
            $coordinateDiff = $coordinate1->diff($coordinate2, $puzzlePart);

            foreach ($coordinateDiff as $coordinate) {
                $this->grid[$coordinate->getY()][$coordinate->getX()] += 1;
            }
        }
    }

    /**
     * @return int
     */
    public function calculateSum(): int
    {
        $sum = 0;

        foreach ($this->grid as $row) {
            foreach ($row as $value) {
                if ($value >= 2) {
                    $sum += 1;
                }
            }
        }

        return $sum;
    }
}