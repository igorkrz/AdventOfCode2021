<?php


namespace App\Tests\Puzzle\Day6;


use App\Puzzle\Day6\Solution;
use App\Tests\PuzzleTestCase;

class SolutionTest extends PuzzleTestCase
{
    /**
     * @var Solution
     */
    private Solution $day6;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day6 = new Solution();

        $this->array = $this->day6->read();
    }

    public function testExample(): void
    {
        $testArray = self::read();

        $this->assertEquals(26, $this->day6->solution1($testArray, 18));

        $this->assertEquals(5934, $this->day6->solution1($testArray, 80));

        $this->assertEquals(26984457539, $this->day6->solution2($testArray, 256));
    }

    public function testSolution1(): void
    {
        $this->assertEquals(362639, $this->day6->solution1($this->array, 80));
    }

    public function testSolution2(): void
    {
        $this->assertEquals(1639854996917, $this->day6->solution2($this->array, 256));
    }
}