<?php

namespace App\Model\Day15;

class Vertex
{
    private string $id;

    /** @var Vertex[] $children  */
    private array $children = [];

    private int $risk;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param Vertex $dest
     * @return Vertex
     */
    public function addChild(Vertex $dest): Vertex
    {
        $this->children[] = $dest;

        return $dest;
    }

    /**
     * @return Vertex[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @return int
     */
    public function getRisk(): int
    {
        return $this->risk;
    }

    /**
     * @param int $risk
     */
    public function setRisk(int $risk): void
    {
        $this->risk = $risk;
    }
}