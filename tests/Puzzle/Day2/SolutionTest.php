<?php


namespace App\Tests\Puzzle\Day2;


use App\Enum\PuzzlePartEnum;
use App\Puzzle\Day2\Solution;
use App\Tests\PuzzleTestCase;

class SolutionTest extends PuzzleTestCase
{
    /**
     * @var Solution
     */
    private Solution $day2;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day2 = new Solution();

        $this->array = $this->day2->read();
    }

    public function testSubmarine(): void
    {
        $testArray = self::read();

        $this->assertEquals(150, $this->day2->getResult(PuzzlePartEnum::FIRST, $testArray));

        $this->assertEquals(900, $this->day2->getResult(PuzzlePartEnum::SECOND, $testArray));
    }

    public function testSolution1(): void
    {
        $this->assertEquals(1654760, $this->day2->solution1($this->array));
    }

    public function testSolution2(): void
    {
        $this->assertEquals(1956047400, $this->day2->solution2($this->array));
    }
}