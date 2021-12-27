<?php

namespace App\Model\Day9;

class Grid
{
    /**
     * @var Point[]
     */
    private array $lowestPoints;

    /**
     * @var Point[]
     */
    private array $points;

    public function __construct()
    {
        $this->points = [];
        $this->lowestPoints = [];
    }

    /**
     * @param Point $point
     * @return int
     */
    public function checkConsecutive(Point $point): int
    {
        if ($point->getValue() > 8) {
            return 0;
        }

        $point->setValue(9);
        $size = 1;

        if ($point->hasUp()) {
            $size += $this->checkConsecutive($this->findPointByPosition($point->getRowKey() - 1, $point->getColumnKey()));
        }
        if ($point->hasDown()) {
            $size += $this->checkConsecutive($this->findPointByPosition($point->getRowKey() + 1, $point->getColumnKey()));
        }
        if ($point->hasNext()) {
            $size += $this->checkConsecutive($this->findPointByPosition($point->getRowKey(), $point->getColumnKey() + 1));
        }
        if ($point->hasPrev()) {
            $size += $this->checkConsecutive($this->findPointByPosition($point->getRowKey(), $point->getColumnKey() - 1));
        }

        return $size;
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
    public function addLowestPoint(Point $point): void
    {
        $this->lowestPoints[] = $point;
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
     * @return Point[]
     */
    public function getLowestPoints(): array
    {
        return $this->lowestPoints;
    }
}