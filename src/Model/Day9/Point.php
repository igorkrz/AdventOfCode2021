<?php

namespace App\Model\Day9;

class Point
{
    private int $value;

    private int $columnKey;

    private int $rowKey;

    private ?Point $next = null;

    private ?Point $prev = null;

    private ?Point $up = null;

    private ?Point $down = null;

    public function __construct(int $value, int $columnKey, int $rowKey)
    {
        $this->value = $value;
        $this->columnKey = $columnKey;
        $this->rowKey = $rowKey;
    }

    /**
     * @return bool
     */
    public function isLowestPoint(): bool
    {
        $isTopRowAndSmallestValue = !$this->hasUp() && $this->getValue() < $this->getDown()->getValue();
        $isBottomRowAndSmallestValue = !$this->hasDown() && $this->getValue() < $this->getUp()->getValue();
        $isSmallestValueTopAndBottom = $this->hasUp() && $this->hasDown() &&
            $this->getValue() < $this->getDown()->getValue() &&
            $this->getValue() < $this->getUp()->getValue();

        return $isTopRowAndSmallestValue || $isBottomRowAndSmallestValue || $isSmallestValueTopAndBottom;
    }

    /**
     * @return bool
     */
    public function isLeftEdge(): bool
    {
        return $this->columnKey === 0;
    }

    /**
     * @param int $length
     * @return bool
     */
    public function isRightEdge(int $length): bool
    {
        return $this->columnKey === $length;
    }

    /**
     * @return bool
     */
    public function hasUp(): bool
    {
        return !is_null($this->up);
    }

    /**
     * @return bool
     */
    public function hasDown(): bool
    {
        return !is_null($this->down);
    }

    /**
     * @return bool
     */
    public function hasNext(): bool
    {
        return !is_null($this->next);
    }

    /**
     * @return bool
     */
    public function hasPrev(): bool
    {
        return !is_null($this->prev);
    }

    /**
     * @return int
     */
    public function getColumnKey(): int
    {
        return $this->columnKey;
    }

    /**
     * @return int
     */
    public function getRowKey(): int
    {
        return $this->rowKey;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }

    /**
     * @return Point|null
     */
    public function getNext(): ?Point
    {
        return $this->next;
    }

    /**
     * @param Point|null $next
     */
    public function setNext(?Point $next): void
    {
        $this->next = $next;
    }

    /**
     * @return Point|null
     */
    public function getPrev(): ?Point
    {
        return $this->prev;
    }

    /**
     * @param Point|null $prev
     */
    public function setPrev(?Point $prev): void
    {
        $this->prev = $prev;
    }

    /**
     * @return Point|null
     */
    public function getUp(): ?Point
    {
        return $this->up;
    }

    /**
     * @param Point|null $up
     */
    public function setUp(?Point $up): void
    {
        $this->up = $up;
    }

    /**
     * @return Point|null
     */
    public function getDown(): ?Point
    {
        return $this->down;
    }

    /**
     * @param Point|null $down
     */
    public function setDown(?Point $down): void
    {
        $this->down = $down;
    }
}