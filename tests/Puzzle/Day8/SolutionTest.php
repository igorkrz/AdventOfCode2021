<?php


namespace App\Tests\Puzzle\Day8;


use App\Puzzle\Day8\Solution;
use App\Tests\PuzzleTestCase;

class SolutionTest extends PuzzleTestCase
{
    /**
     * @var Solution
     */
    private Solution $day8;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day8 = new Solution();

        $this->array = $this->day8->read();
    }

    public function testExample(): void
    {
        $testArray = self::read();

        $this->assertEquals(26, $this->day8->solution1($testArray));

        $this->assertEquals(61229, $this->day8->solution2($testArray));
    }

    public function testSolution1(): void
    {
        $this->assertEquals(548, $this->day8->solution1($this->array));
    }

    public function testSolution2(): void
    {
        $this->assertEquals(1074888, $this->day8->solution2($this->array));
    }
}