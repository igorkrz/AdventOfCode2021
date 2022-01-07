<?php


namespace App\Puzzle\Day16;


use App\Model\AbstractPuzzle;
use App\Model\Day16\HexConverter;
use App\Model\Day16\Packet;

class Solution extends AbstractPuzzle
{
    /**
     * @inheritDoc
     */
    public function solution1(array $array = []): string
    {
        $binString = HexConverter::convert($array[0]);

        $packet = new Packet($binString);

        return (string)$packet->getPacketVersionSum();
    }

    /**
     * @inheritDoc
     */
    public function solution2(array $array = []): string
    {
        $binString = HexConverter::convert($array[0]);

        $packet = new Packet($binString);

        return (string)$packet->getValue();
    }
}