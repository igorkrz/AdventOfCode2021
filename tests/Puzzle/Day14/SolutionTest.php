<?php


namespace App\Tests\Puzzle\Day14;


use App\Puzzle\Day14\Solution;
use App\Tests\PuzzleTestCase;

class SolutionTest extends PuzzleTestCase
{
    /**
     * @var Solution
     */
    private Solution $day14;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day14 = new Solution();

        $this->array = $this->day14->read();
    }

    public function testExample(): void
    {
        $testArray = self::read();

        $this->assertEquals(1588, $this->day14->solution1($testArray));

        $this->assertEquals(2188189693529, $this->day14->solution2($testArray));
    }

    public function testSolution1(): void
    {
        $this->assertEquals(2947, $this->day14->solution1($this->array));
    }

    public function testSolution2(): void
    {
        $this->assertEquals(3232426226464, $this->day14->solution2($this->array));
    }
}