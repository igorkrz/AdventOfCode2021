<?php

namespace App\Model\Day13;

use App\Enum\PuzzlePartEnum;

class Fold
{
    /**
     * @var Point[]
     */
    private array $foldInstructions = [];

    /**
     * @var Point[]
     */
    private array $points;

    private int $width;

    private int $height;

    /**
     * @param int $puzzlePart
     * @return void
     */
    public function fold(int $puzzlePart)
    {
        if ($puzzlePart === PuzzlePartEnum::FIRST) {
            $instructions[] = $this->foldInstructions[0];
        }
        else {
            $instructions = $this->foldInstructions;
        }

        foreach ($instructions as $instruction) {
            // Fold up
            if ($instruction->getX() === 0) {
                $this->setHeight($instruction->getY());
                foreach ($this->points as $point) {
                    if ($point->getY() > $instruction->getY()) {
                        $newY = $instruction->getY() - abs($instruction->getY() - $point->getY());
                        $point->setY($newY);
                    }
                }
            }
            // Fold left
            elseif ($instruction->getY() === 0) {
                $this->setWidth($instruction->getX());
                foreach ($this->points as $point) {
                    if ($point->getX() > $instruction->getX()) {
                        $newX = $instruction->getX() - abs($instruction->getX() - $point->getX());
                        $point->setX($newX);
                    }
                }
            }
        }
    }

    /**
     * @return int
     */
    public function getSolution(): int
    {
        $numberOfDots = 0;

        $helper = $this->createGrid();

        foreach ($helper as $item) {
            foreach ($item as $value) {
                if ($value === '#') {
                    $numberOfDots += 1;
                }
            }
        }

        return $numberOfDots;
    }

    /**
     * @return array
     */
    private function createGrid(): array
    {
        $helper = [];

        for ($i = 0; $i < $this->height; $i ++) {
            for ($j = 0; $j < $this->width; $j ++) {
                $helper[$i][$j] = '.';
            }
        }
        foreach ($this->points as $point) {
            $helper[$point->getY()][$point->getX()] = '#';
        }

        return $helper;
    }

    /**
     * @param Point $point
     */
    public function addPoint(Point $point): void
    {
        $this->points[] = $point;
    }

    /**
     * @return Point[]
     */
    public function getPoints(): array
    {
        return $this->points;
    }

    /**
     * @param Point $point
     * @return void
     */
    public function addFoldInstructions(Point $point)
    {
        $this->foldInstructions[] = $point;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    /**
     * @return void
     */
    public function printFold()
    {
        $helper = $this->createGrid();

        print_r("\n");
        foreach ($helper as $row) {
            foreach ($row as $column) {
                print_r("$column");
            }
            print_r("\n");
        }
    }
}