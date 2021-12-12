<?php


namespace App\Tests\Puzzle\Day4;


use App\Puzzle\Day4\Solution;
use App\Tests\PuzzleTestCase;

class SolutionTest extends PuzzleTestCase
{
    /**
     * @var Solution
     */
    private Solution $day4;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day4 = new Solution();

        $this->array = $this->day4->read();
    }

    public function testExample(): void
    {
        $testArray = self::read();

        $this->assertEquals(4512, $this->day4->solution1($testArray));

        $this->assertEquals(1924, $this->day4->solution2($testArray));
    }

    public function testSolution1(): void
    {
        $this->assertEquals(33462, $this->day4->solution1($this->array));

        $this->assertEquals(30070, $this->day4->solution2($this->array));
    }
}