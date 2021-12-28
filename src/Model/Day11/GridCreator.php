<?php

namespace App\Model\Day11;

class GridCreator
{
    private array $array;

    private Grid $grid;

    public function __construct(array $array)
    {
        $length = strlen($array[0]) - 1;

        foreach ($array as $item) {
            $split = str_split($item);
            $this->array[] = array_map("intval", $split);
        }

        $grid = new Grid();

        foreach ($this->array as $rowKey => $row) {
            $pointer = $row;

            foreach ($row as $columnKey => $value) {
                $point = new Point($value, $columnKey, $rowKey);

                $this->setTop($point, $rowKey, $columnKey);
                $this->setBottom($point, $rowKey, $columnKey);

                if ($point->isLeftEdge()) {
                    $next = new Point(next($pointer), $columnKey + 1, $rowKey);
                    $point->setRight($next);

                    $this->setBottomRight($point, $rowKey, $columnKey);
                    $this->setTopRight($point, $rowKey, $columnKey);
                } elseif ($point->isRightEdge($length)) {
                    $prev = new Point(prev($pointer), $columnKey - 1, $rowKey);
                    $point->setLeft($prev);
                    $this->setBottomLeft($point, $rowKey, $columnKey);
                    $this->setTopLeft($point, $rowKey, $columnKey);
                } else {
                    $prev = new Point(prev($pointer), $columnKey - 1, $rowKey);
                    $point->setLeft($prev);
                    $currentValue = next($pointer);
                    $next = new Point(next($pointer), $columnKey + 1, $rowKey);
                    $point->setRight($next);

                    $this->setBottomRight($point, $rowKey, $columnKey);
                    $this->setBottomLeft($point, $rowKey, $columnKey);
                    $this->setTopRight($point, $rowKey, $columnKey);
                    $this->setTopLeft($point, $rowKey, $columnKey);
                }
                $grid->addPoint($point);
            }
        }

        $this->grid = $grid;
    }

    /**
     * @param Point $point
     * @param int $rowKey
     * @param int $columnKey
     * @return void
     */
    private function setBottom(Point &$point,int $rowKey, int $columnKey)
    {
        $bottom = null;

        if (isset($this->array[$rowKey + 1][$columnKey])) {
            $bottomValue = $this->array[$rowKey + 1][$columnKey];
            $bottom = new Point($bottomValue, $columnKey, $rowKey + 1);
        }

        $point->setBottom($bottom);
    }

    /**
     * @param Point $point
     * @param int $rowKey
     * @param int $columnKey
     * @return void
     */
    private function setTop(Point $point,int $rowKey, int $columnKey): void
    {
        $top = null;

        if (isset($this->array[$rowKey - 1][$columnKey])) {
            $topValue = $this->array[$rowKey - 1][$columnKey];
            $top = new Point($topValue, $columnKey, $rowKey - 1);
        }

        $point->setTop($top);
    }

    /**
     * @param Point $point
     * @param int $rowKey
     * @param int $columnKey
     * @return void
     */
    private function setBottomRight(Point $point,int $rowKey, int $columnKey): void
    {
        if ($point->hasBottom()) {
            $bottomRightValue = $this->array[$rowKey + 1][$columnKey + 1];
            $bottomRight = new Point($bottomRightValue, $columnKey + 1, $rowKey + 1);
            $point->setBottomRight($bottomRight);
        }
    }

    /**
     * @param Point $point
     * @param int $rowKey
     * @param int $columnKey
     * @return void
     */
    private function setBottomLeft(Point $point,int $rowKey, int $columnKey): void
    {
        if ($point->hasBottom()) {
            $bottomLeftValue = $this->array[$rowKey + 1][$columnKey - 1];
            $bottomLeft = new Point($bottomLeftValue, $columnKey - 1, $rowKey + 1);
            $point->setBottomLeft($bottomLeft);
        }
    }

    /**
     * @param Point $point
     * @param int $rowKey
     * @param int $columnKey
     * @return void
     */
    private function setTopRight(Point $point,int $rowKey, int $columnKey): void
    {
        if ($point->hasTop()) {
            $topRightValue = $this->array[$rowKey - 1][$columnKey + 1];
            $topRight = new Point($topRightValue, $columnKey + 1, $rowKey - 1);
            $point->setTopRight($topRight);
        }
    }

    /**
     * @param Point $point
     * @param int $rowKey
     * @param int $columnKey
     * @return void
     */
    private function setTopLeft(Point $point,int $rowKey, int $columnKey): void
    {
        if ($point->hasTop()) {
            $topLeftValue = $this->array[$rowKey - 1][$columnKey - 1];
            $topLeft = new Point($topLeftValue, $columnKey - 1, $rowKey - 1);
            $point->setTopLeft($topLeft);
        }
    }

    /**
     * @return Grid
     */
    public function getGrid(): Grid
    {
        return $this->grid;
    }
}