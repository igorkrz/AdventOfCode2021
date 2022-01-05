<?php

namespace App\Model\Day15;

use App\Enum\PuzzlePartEnum;

class Dijkstra
{
    private const COORDS = [[1, 0], [0, 1], [-1, 0], [0, -1]];

    private int $rows;

    private int $columns;

    private array $queue;

    private array $distances;

    /** @var Vertex[] $graph  */
    private array $graph = [];

    public function __construct(array $array, int $puzzlePart)
    {
        $this->prepareGraph($array, $puzzlePart);
    }

    /**
     * @return int
     */
    public function getShortestPath(): int
    {
        $id = "$this->rows:$this->columns";

        return $this->getShortestPaths()[$id];
    }

    /**
     * @return array
     */
    private function getShortestPaths(): array
    {
        array_shift($this->queue);

        $toCheck = [];

        foreach ($this->graph['0:0']->getChildren() as $vertex) {
            $this->distances[$vertex->getId()] = $vertex->getRisk();
            $toCheck[$vertex->getId()] = $vertex->getRisk();
        }

        while (!empty($this->queue)) {
            $minIndex = array_search(min($toCheck), $toCheck);
            $minRisk = $this->distances[$minIndex];

            unset($this->queue[$minIndex]);
            unset($toCheck[$minIndex]);

            foreach ($this->graph[$minIndex]->getChildren() as $vertex) {
                if ($this->distances[$vertex->getId()] > $minRisk + $vertex->getRisk()) {
                    $this->distances[$vertex->getId()] = $minRisk + $vertex->getRisk();
                    $toCheck[$vertex->getId()] = $minRisk + $vertex->getRisk();
                }
            }
        }

        return $this->distances;
    }

    /**
     * @param array $array
     * @param int $puzzlePart
     * @return void
     */
    private function prepareGraph(array $array, int $puzzlePart)
    {
        switch ($puzzlePart) {
            case PuzzlePartEnum::FIRST:
                $this->rows = count($array) - 1;
                $this->columns = strlen($array[0]) - 1;
                break;
            case PuzzlePartEnum::SECOND:
                $this->rows = (count($array) * 5) - 1;
                $this->columns = (strlen($array[0]) * 5) - 1;
                break;
        }


        for ($row = 0; $row <= $this->rows; $row ++) {
            for ($column = 0; $column <= $this->columns; $column ++) {
                $id = "$row:$column";
                $this->queue[$id] = false;
                $this->graph[$id] = new Vertex($id);
                $this->distances[$id] = PHP_INT_MAX;
            }
        }

        for ($row = 0; $row <= $this->rows; $row ++) {
            for ($column = 0; $column <= $this->columns; $column ++) {
                $id = "$row:$column";
                $vertex = $this->graph[$id];
                foreach (self::COORDS as [$x, $y]) {
                    $newX = $row + $x;
                    $newY = $column + $y;
                    $id = "$newX:$newY";

                    if ($newX <= $this->rows && $newX >= 0 && $newY <= $this->columns && $newY >= 0) {
                        switch ($puzzlePart) {
                            case PuzzlePartEnum::FIRST:
                                $vertex->addChild($this->graph[$id])->setRisk((int)$array[$newX][$newY]);
                                break;
                            case PuzzlePartEnum::SECOND:
                                $rows = ($this->rows + 1) / 5;
                                $columns = ($this->columns + 1) / 5;

                                $risk = (int)$array[$newX % $rows][$newY % $columns];
                                $risk += (int)(floor($newX / $rows) + floor($newY / $columns));
                                $risk = $risk <= 9 ? $risk : $risk - 9;

                                $vertex->addChild($this->graph[$id])->setRisk($risk);
                                break;
                            default:
                                break;
                        }
                    }
                }
            }
        }
    }
}