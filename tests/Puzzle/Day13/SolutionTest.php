<?php


namespace App\Tests\Puzzle\Day13;


use App\Puzzle\Day13\Solution;
use App\Tests\PuzzleTestCase;

class SolutionTest extends PuzzleTestCase
{
    /**
     * @var Solution
     */
    private Solution $day13;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day13 = new Solution();

        $this->array = $this->day13->read();
    }

    public function testExample(): void
    {
        $testArray = self::read();

        $this->assertEquals(17, $this->day13->solution1($testArray));

        $this->assertEquals(16, $this->day13->solution2($testArray));
    }

    public function testSolution1(): void
    {
        $this->assertEquals(818, $this->day13->solution1($this->array));
    }

    public function testSolution2(): void
    {
        $this->assertEquals(101, $this->day13->solution2($this->array));
    }
}