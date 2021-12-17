<?php


namespace App\Tests\Puzzle\Day5;


use App\Puzzle\Day5\Solution;
use App\Tests\PuzzleTestCase;

class SolutionTest extends PuzzleTestCase
{
    /**
     * @var Solution
     */
    private Solution $day5;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day5 = new Solution();

        $this->array = $this->day5->read();
    }

    public function testExample(): void
    {
        $testArray = self::read();

        $this->assertEquals(5, $this->day5->solution1($testArray));

        $this->assertEquals(12, $this->day5->solution2($testArray));
    }

    public function testSolution1(): void
    {
        $this->assertEquals(6311, $this->day5->solution1($this->array));
    }

    public function testSolution2(): void
    {
        $this->assertEquals(19929, $this->day5->solution2($this->array));
    }
}