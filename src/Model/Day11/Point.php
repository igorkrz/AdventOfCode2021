<?php

namespace App\Model\Day11;

class Point
{
    private int $value;

    private int $columnKey;

    private int $rowKey;

    private ?Point $right = null;

    private ?Point $left = null;

    private ?Point $top = null;

    private ?Point $bottom = null;

    private ?Point $topLeft = null;

    private ?Point $topRight = null;

    private ?Point $bottomLeft = null;

    private ?Point $bottomRight = null;

    public function __construct(int $value, int $columnKey, int $rowKey)
    {
        $this->value = $value;
        $this->columnKey = $columnKey;
        $this->rowKey = $rowKey;
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
    public function hasTop(): bool
    {
        return !is_null($this->top);
    }

    /**
     * @return bool
     */
    public function hasTopRight(): bool
    {
        return !is_null($this->topRight);
    }

    /**
     * @return bool
     */
    public function hasTopLeft(): bool
    {
        return !is_null($this->topLeft);
    }

    /**
     * @return bool
     */
    public function hasBottom(): bool
    {
        return !is_null($this->bottom);
    }

    /**
     * @return bool
     */
    public function hasBottomRight(): bool
    {
        return !is_null($this->bottomRight);
    }

    /**
     * @return bool
     */
    public function hasBottomLeft(): bool
    {
        return !is_null($this->bottomLeft);
    }

    /**
     * @return bool
     */
    public function hasRight(): bool
    {
        return !is_null($this->right);
    }

    /**
     * @return bool
     */
    public function hasLeft(): bool
    {
        return !is_null($this->left);
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
    public function getRight(): ?Point
    {
        return $this->right;
    }

    /**
     * @param Point|null $right
     */
    public function setRight(?Point $right): void
    {
        $this->right = $right;
    }

    /**
     * @return Point|null
     */
    public function getLeft(): ?Point
    {
        return $this->left;
    }

    /**
     * @param Point|null $left
     */
    public function setLeft(?Point $left): void
    {
        $this->left = $left;
    }

    /**
     * @return Point|null
     */
    public function getTop(): ?Point
    {
        return $this->top;
    }

    /**
     * @param Point|null $top
     */
    public function setTop(?Point $top): void
    {
        $this->top = $top;
    }

    /**
     * @return Point|null
     */
    public function getBottom(): ?Point
    {
        return $this->bottom;
    }

    /**
     * @param Point|null $bottom
     */
    public function setBottom(?Point $bottom): void
    {
        $this->bottom = $bottom;
    }

    /**
     * @return Point|null
     */
    public function getTopLeft(): ?Point
    {
        return $this->topLeft;
    }

    /**
     * @param Point|null $topLeft
     */
    public function setTopLeft(?Point $topLeft): void
    {
        $this->topLeft = $topLeft;
    }

    /**
     * @return Point|null
     */
    public function getTopRight(): ?Point
    {
        return $this->topRight;
    }

    /**
     * @param Point|null $topRight
     */
    public function setTopRight(?Point $topRight): void
    {
        $this->topRight = $topRight;
    }

    /**
     * @return Point|null
     */
    public function getBottomLeft(): ?Point
    {
        return $this->bottomLeft;
    }

    /**
     * @param Point|null $bottomLeft
     */
    public function setBottomLeft(?Point $bottomLeft): void
    {
        $this->bottomLeft = $bottomLeft;
    }

    /**
     * @return Point|null
     */
    public function getBottomRight(): ?Point
    {
        return $this->bottomRight;
    }

    /**
     * @param Point|null $bottomRight
     */
    public function setBottomRight(?Point $bottomRight): void
    {
        $this->bottomRight = $bottomRight;
    }
}