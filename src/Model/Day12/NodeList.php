<?php

namespace App\Model\Day12;

use App\Enum\PuzzlePartEnum;

class NodeList
{
    public const START = 'start';

    private const END = 'end';

    private array $nodes;

    public function __construct(array $nodes)
    {
        $this->nodes = $nodes;
    }

    /**
     * @param int $puzzlePart
     * @return int
     */
    public function getSolution(int $puzzlePart): int
    {
        $pathsToEnd = 0;

        $puzzlePart = $puzzlePart === PuzzlePartEnum::FIRST;

        foreach ($this->nodes[self::START] as $destination) {
            $pathsToEnd += $this->countPaths([self::START], $destination, $puzzlePart);
        }

        return $pathsToEnd;
    }

    /**
     * @param string[] $path
     */
    public function countPaths(array $path, string $destination, bool $isVisitedTwice): int
    {
        if ($destination === self::END) {
            return 1;
        }

        if ($destination === strtolower($destination) && in_array($destination, $path)) {
            if ($isVisitedTwice) {
                return 0;
            }
            $isVisitedTwice = true;
        }

        $path[] = $destination;

        $pathsToEnd = 0;

        foreach ($this->nodes[$destination] as $destination) {
            $pathsToEnd += $this->countPaths($path, $destination, $isVisitedTwice);
        }

        return $pathsToEnd;
    }
}