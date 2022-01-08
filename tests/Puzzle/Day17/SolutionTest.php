<?php


namespace App\Tests\Puzzle\Day17;


use App\Puzzle\Day17\Solution;
use App\Tests\PuzzleTestCase;

class SolutionTest extends PuzzleTestCase
{
    /**
     * @var Solution
     */
    private Solution $day17;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day17 = new Solution();

        $this->array = $this->day17->read();
    }

    public function testExample(): void
    {
        $testArray = self::read();

        $this->assertEquals(45, $this->day17->solution1($testArray));

        $this->assertEquals(112, $this->day17->solution2($testArray));
    }

    public function testSolution1(): void
    {
        $this->assertEquals(5565, $this->day17->solution1($this->array));
    }

    public function testSolution2(): void
    {
        $this->assertEquals(2118, $this->day17->solution2($this->array));
    }
}