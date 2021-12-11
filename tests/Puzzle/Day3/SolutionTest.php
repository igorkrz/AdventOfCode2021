<?php


namespace App\Tests\Puzzle\Day3;


use App\Puzzle\Day3\Solution;
use App\Tests\PuzzleTestCase;

class SolutionTest extends PuzzleTestCase
{
    /**
     * @var Solution
     */
    private Solution $day3;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day3 = new Solution();

        $this->array = $this->day3->read();
    }

    public function testExample(): void
    {
        $testArray = self::read();

        $this->assertEquals(198, $this->day3->solution1($testArray));

        $this->assertEquals(230, $this->day3->solution2($testArray));
    }

    public function testSolution1(): void
    {
        $this->assertEquals(1082324, $this->day3->solution1($this->array));
    }

    public function testSolution2(): void
    {
        $this->assertEquals(1353024, $this->day3->solution2($this->array));
    }
}