<?php


namespace App\Tests\Puzzle\Day11;


use App\Puzzle\Day11\Solution;
use App\Tests\PuzzleTestCase;

class SolutionTest extends PuzzleTestCase
{
    /**
     * @var Solution
     */
    private Solution $day11;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day11 = new Solution();

        $this->array = $this->day11->read();
    }

    public function testExample(): void
    {
        $testArray = self::read();

        $this->assertEquals(1656, $this->day11->solution1($testArray));

        $this->assertEquals(195, $this->day11->solution2($testArray));
    }

    public function testSolution1(): void
    {
        $this->assertEquals(1599, $this->day11->solution1($this->array));
    }

    public function testSolution2(): void
    {
        $this->assertEquals(418, $this->day11->solution2($this->array));
    }
}