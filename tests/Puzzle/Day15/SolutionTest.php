<?php


namespace App\Tests\Puzzle\Day15;


use App\Puzzle\Day15\Solution;
use App\Tests\PuzzleTestCase;

class SolutionTest extends PuzzleTestCase
{
    /**
     * @var Solution
     */
    private Solution $day15;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day15 = new Solution();

        $this->array = $this->day15->read();
    }

    public function testExample(): void
    {
        $testArray = self::read();

        $this->assertEquals(40, $this->day15->solution1($testArray));

        $this->assertEquals(315, $this->day15->solution2($testArray));
    }

    public function testSolution1(): void
    {
        $this->assertEquals(523, $this->day15->solution1($this->array));
    }

    public function testSolution2(): void
    {
        $this->assertEquals(2876, $this->day15->solution2($this->array));
    }
}