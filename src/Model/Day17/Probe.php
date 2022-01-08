<?php

namespace App\Model\Day17;

class Probe
{
    private Target $target;

    public function __construct(Target $target)
    {
        $this->target = $target;
    }

    /**
     * @return float|int
     */
    public function getHighestY()
    {
        $n = $this->target->getMinY();

        return $n * ($n + 1) / 2;
    }

    /**
     * @return int
     */
    public function calculateDifferentPoints(): int
    {
        $minX = (int)(0.5 * (sqrt(1 + 8 * $this->target->getMinX()) - 1));
        $result = 0;

        for ($y = $this->target->getMinY(); $y <= abs($this->target->getMaxX()); $y++) {
            for ($x = $minX; $x <= $this->target->getMaxX(); $x++) {
                if ($this->isTargetAreaHit($x, $y)) {
                    $result += 1;
                }
            }
        }

        return $result;
    }

    /**
     * @param int $currentX
     * @param int $currentY
     * @return bool
     */
    private function isTargetAreaHit(int $currentX, int $currentY): bool
    {
        $x = $y = 0;

        $vCheck = $y < $this->target->getMinY() && $currentY <= 0;
        $hCheck = ($x < $this->target->getMinX() && $currentX <= 0) ||
            ($x > $this->target->getMaxX() && $currentX >= 0);

        while (!($hCheck || $vCheck)) {
            $x += $currentX;
            $y += $currentY;

            if ($currentX > 0) {
                $currentX -= 1;
            } elseif ($currentX < 0) {
                $currentX += 1;
            }

            $currentY -= 1;

            $vCheck = $y < $this->target->getMinY() && $currentY <= 0;
            $hCheck = ($x < $this->target->getMinX() && $currentX <= 0) ||
                ($x > $this->target->getMaxX() && $currentX >= 0);

            $isTargetHit = $x >= $this->target->getMinX() && $x <= $this->target->getMaxX() &&
                $y >= $this->target->getMinY() && $y <= $this->target->getMaxY();

            if ($isTargetHit) {
                return true;
            }
        }

        return false;
    }
}