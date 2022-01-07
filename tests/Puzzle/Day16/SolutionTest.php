<?php


namespace App\Tests\Puzzle\Day16;


use App\Puzzle\Day16\Solution;
use App\Tests\PuzzleTestCase;

class SolutionTest extends PuzzleTestCase
{
    /**
     * @var Solution
     */
    private Solution $day16;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day16 = new Solution();

        $this->array = $this->day16->read();
    }

    public function testExample(): void
    {
        $testArray = self::read();

        $this->assertEquals(31, $this->day16->solution1($testArray));

        $this->assertEquals(54, $this->day16->solution2($testArray));
    }

    public function testSolution1(): void
    {
        $this->assertEquals(920, $this->day16->solution1($this->array));
    }

    public function testSolution2(): void
    {
        $this->assertEquals(10185143721112, $this->day16->solution2($this->array));
    }
}