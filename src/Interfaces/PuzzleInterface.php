<?php


namespace App\Interfaces;


interface PuzzleInterface
{
    /**
     * Map input file to array
     */
    public function read(): array;

    /**
     * Write output in
     * @param string $string
     */
    public function write(string $string): void;

    /**
     * Algorithm for the first part of the puzzle
     * @param array $array
     * @return string
     */
    public function solution1(array $array = []): string;

    /**
     * Algorithm for the second part of the puzzle
     * @param array $array
     * @return string
     */
    public function solution2(array $array = []): string;
}