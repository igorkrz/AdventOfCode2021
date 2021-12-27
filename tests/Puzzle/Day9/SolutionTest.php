<?php


namespace App\Tests\Puzzle\Day9;


use App\Puzzle\Day9\Solution;
use App\Tests\PuzzleTestCase;

class SolutionTest extends PuzzleTestCase
{
    /**
     * @var Solution
     */
    private Solution $day9;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day9 = new Solution();

        $this->array = $this->day9->read();
    }

    public function testExample(): void
    {
        $testArray = self::read();

        $this->assertEquals(15, $this->day9->solution1($testArray));

        $this->assertEquals(1134, $this->day9->solution2($testArray));
    }

    public function testSolution1(): void
    {
        $this->assertEquals(535, $this->day9->solution1($this->array));
    }

    public function testSolution2(): void
    {
        $this->assertEquals(1122700, $this->day9->solution2($this->array));
    }
}