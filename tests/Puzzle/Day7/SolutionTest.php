<?php


namespace App\Tests\Puzzle\Day7;


use App\Puzzle\Day7\Solution;
use App\Tests\PuzzleTestCase;

class SolutionTest extends PuzzleTestCase
{
    /**
     * @var Solution
     */
    private Solution $day7;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day7 = new Solution();

        $this->array = $this->day7->read();
    }

    public function testExample(): void
    {
        $testArray = self::read();

        $this->assertEquals(37, $this->day7->solution1($testArray));

        $this->assertEquals(170, $this->day7->solution2($testArray));
    }

    public function testSolution1(): void
    {
        $this->assertEquals(349812, $this->day7->solution1($this->array));
    }

    public function testSolution2(): void
    {
        $this->assertEquals(99763899, $this->day7->solution2($this->array));
    }
}