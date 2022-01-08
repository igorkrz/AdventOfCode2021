<?php

namespace App\Model\Day17;

class Target
{
    private int $minX;

    private int $maxX;

    private int $minY;

    private int $maxY;

    public function __construct(array $array)
    {
        preg_match_all("%-?\d+%", $array[0], $matches);
        $matches = array_map(function ($element) {
            return intval($element);
        }, $matches[0]);

        $this->minX = $matches[0];
        $this->maxX = $matches[1];
        $this->minY = $matches[2];
        $this->maxY = $matches[3];
    }

    /**
     * @return int|mixed
     */
    public function getMinX()
    {
        return $this->minX;
    }

    /**
     * @return int|mixed
     */
    public function getMaxX()
    {
        return $this->maxX;
    }

    /**
     * @return int|mixed
     */
    public function getMinY()
    {
        return $this->minY;
    }

    /**
     * @return int|mixed
     */
    public function getMaxY()
    {
        return $this->maxY;
    }
}