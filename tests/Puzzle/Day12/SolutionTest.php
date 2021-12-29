<?php


namespace App\Tests\Puzzle\Day12;


use App\Puzzle\Day12\Solution;
use App\Tests\PuzzleTestCase;

class SolutionTest extends PuzzleTestCase
{
    /**
     * @var Solution
     */
    private Solution $day12;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day12 = new Solution();

        $this->array = $this->day12->read();
    }

    public function testExample(): void
    {
        $testArray = self::read();

        $this->assertEquals(10, $this->day12->solution1($testArray));

        $this->assertEquals(36, $this->day12->solution2($testArray));
    }

    public function testSolution1(): void
    {
        $this->assertEquals(4970, $this->day12->solution1($this->array));
    }

    public function testSolution2(): void
    {
        $this->assertEquals(137948, $this->day12->solution2($this->array));
    }
}