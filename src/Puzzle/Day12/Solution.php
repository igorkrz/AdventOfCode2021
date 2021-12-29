<?php


namespace App\Puzzle\Day12;


use App\Enum\PuzzlePartEnum;
use App\Model\AbstractPuzzle;
use App\Model\Day12\Node;
use App\Model\Day12\NodeList;

class Solution extends AbstractPuzzle
{
    /**
     * @inheritDoc
     */
    public function solution1(array $array = []): string
    {
        $nodeList = $this->createNodeList($array);
        return (string)$nodeList->getSolution(PuzzlePartEnum::FIRST);
    }

    /**
     * @inheritDoc
     */
    public function solution2(array $array = []): string
    {
        $nodeList = $this->createNodeList($array);
        return (string)$nodeList->getSolution(PuzzlePartEnum::SECOND);
    }

    /**
     * @param array $array
     * @return NodeList
     */
    private function createNodeList(array $array): NodeList
    {
        $nodes = [];

        foreach ($array as $item) {
            $split = explode('-', $item);

            $node = new Node();
            $node->setName($split[0]);
            $node->setNext($split[1]);

            $nodes[$node->getName()] ?? $nodes[$node->getName()] = [];
            $nodes[$node->getNext()] ?? $nodes[$node->getNext()] = [];

            if ($node->getNext() !== NodeList::START) {
                $nodes[$node->getName()][] = $node->getNext();
            }
            if ($node->getName() !== NodeList::START) {
                $nodes[$node->getNext()][] = $node->getName();
            }
        }

        return new NodeList($nodes);
    }
}