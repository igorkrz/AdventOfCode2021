<?php

namespace App\Model\Day11;

class Grid
{
    /**
     * @var array<Point[]>
     */
    private array $points;

    private int $numberOfFlashes = 0;

    public function __construct()
    {
        $this->points = [];
    }

    /**
     * @return int
     */
    private function findAllFlashes(): int
    {
        $flashes = 0;
        foreach ($this->points as $points) {
            foreach ($points as $point) {
                if ($point->getValue() === 0) {
                    $flashes += 1;
                }
            }
        }

        return $flashes;
    }

    /**
     * @param int $steps
     * @return int|void
     */
    public function calculateSteps(int $steps)
    {
        for ($step = 0; $step < $steps; $step ++) {
            foreach ($this->points as $points) {
                foreach ($points as $point) {
                    $point->setValue($point->getValue() + 1);
                }
            }

            foreach ($this->points as $points) {
                foreach ($points as $point) {
                    if ($point->getValue() > 9) {
                        $this->numberOfFlashes += 1;
                        $point->setValue(0);
                        $this->flashAdjacent($point);
                    }
                }
            }
            if ($this->findAllFlashes() === 100) {
                return $step;
            }
        }
    }

    /**
     * @param Point $point
     * @return void
     */
    private function flashAdjacent(Point $point)
    {
        if ($point->hasBottom()) {
            $newPoint = $this->findPointByPosition($point->getRowKey() + 1, $point->getColumnKey());
            if ($newPoint->getValue() !== 0) {
                $newPoint->setValue($newPoint->getValue() + 1);
                if ($newPoint->getValue() > 9) {
                    $this->numberOfFlashes += 1;
                    $newPoint->setValue(0);
                    $this->flashAdjacent($newPoint);
                }
            }
        }
        if ($point->hasBottomRight()) {
            $newPoint = $this->findPointByPosition($point->getRowKey() + 1, $point->getColumnKey() + 1);
            if ($newPoint->getValue() !== 0) {
                $newPoint->setValue($newPoint->getValue() + 1);
                if ($newPoint->getValue() > 9) {
                    $this->numberOfFlashes += 1;
                    $newPoint->setValue(0);
                    $this->flashAdjacent($newPoint);
                }
            }
        }
        if ($point->hasBottomLeft()) {
            $newPoint = $this->findPointByPosition($point->getRowKey() + 1, $point->getColumnKey() - 1);
            if ($newPoint->getValue() !== 0) {
                $newPoint->setValue($newPoint->getValue() + 1);
                if ($newPoint->getValue() > 9) {
                    $this->numberOfFlashes += 1;
                    $newPoint->setValue(0);
                    $this->flashAdjacent($newPoint);
                }
            }
        }
        if ($point->hasTop()) {
            $newPoint = $this->findPointByPosition($point->getRowKey() - 1, $point->getColumnKey());
            if ($newPoint->getValue() !== 0) {
                $newPoint->setValue($newPoint->getValue() + 1);
                if ($newPoint->getValue() > 9) {
                    $this->numberOfFlashes += 1;
                    $newPoint->setValue(0);
                    $this->flashAdjacent($newPoint);
                }
            }
        }
        if ($point->hasTopRight()) {
            $newPoint = $this->findPointByPosition($point->getRowKey() - 1, $point->getColumnKey() + 1);
            if ($newPoint->getValue() !== 0) {
                $newPoint->setValue($newPoint->getValue() + 1);
                if ($newPoint->getValue() > 9) {
                    $this->numberOfFlashes += 1;
                    $newPoint->setValue(0);
                    $this->flashAdjacent($newPoint);
                }
            }
        }
        if ($point->hasTopLeft()) {
            $newPoint = $this->findPointByPosition($point->getRowKey() - 1, $point->getColumnKey() - 1);
            if ($newPoint->getValue() !== 0) {
                $newPoint->setValue($newPoint->getValue() + 1);
                if ($newPoint->getValue() > 9) {
                    $this->numberOfFlashes += 1;
                    $newPoint->setValue(0);
                    $this->flashAdjacent($newPoint);
                }
            }
        }
        if ($point->hasRight()) {
            $newPoint = $this->findPointByPosition($point->getRowKey(), $point->getColumnKey() + 1);
            if ($newPoint->getValue() !== 0) {
                $newPoint->setValue($newPoint->getValue() + 1);
                if ($newPoint->getValue() > 9) {
                    $this->numberOfFlashes += 1;
                    $newPoint->setValue(0);
                    $this->flashAdjacent($newPoint);
                }
            }
        }
        if ($point->hasLeft()) {
            $newPoint = $this->findPointByPosition($point->getRowKey(), $point->getColumnKey() - 1);
            if ($newPoint->getValue() !== 0) {
                $newPoint->setValue($newPoint->getValue() + 1);
                if ($newPoint->getValue() > 9) {
                    $this->numberOfFlashes += 1;
                    $newPoint->setValue(0);
                    $this->flashAdjacent($newPoint);
                }
            }
        }
    }

    /**
     * @param int $rowKey
     * @param int $columnKey
     * @return Point
     */
    private function findPointByPosition(int $rowKey, int $columnKey): Point
    {
        return $this->points[$rowKey][$columnKey];
    }

    /**
     * @param Point $point
     * @return void
     */
    public function addPoint(Point $point): void
    {
        $this->points[$point->getRowKey()][$point->getColumnKey()] = $point;
    }

    /**
     * @return int
     */
    public function getNumberOfFlashes(): int
    {
        return $this->numberOfFlashes;
    }
}