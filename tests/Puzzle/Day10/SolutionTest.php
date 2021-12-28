<?php


namespace App\Tests\Puzzle\Day10;


use App\Puzzle\Day10\Solution;
use App\Tests\PuzzleTestCase;

class SolutionTest extends PuzzleTestCase
{
    /**
     * @var Solution
     */
    private Solution $day10;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day10 = new Solution();

        $this->array = $this->day10->read();
    }

    public function testExample(): void
    {
        $testArray = self::read();

        $this->assertEquals(26397, $this->day10->solution1($testArray));

        $this->assertEquals(288957, $this->day10->solution2($testArray));
    }

    public function testSolution1(): void
    {
        $this->assertEquals(296535, $this->day10->solution1($this->array));
    }

    public function testSolution2(): void
    {
        $this->assertEquals(4245130838, $this->day10->solution2($this->array));
    }
}