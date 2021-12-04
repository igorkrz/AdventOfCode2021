<?php


namespace App\Tests\Puzzle\Day1;


use App\Puzzle\Day1\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    /**
     * @var Solution
     */
    private Solution $day1;

    /**
     * @var array
     */
    private array $array;

    protected function setUp(): void
    {
        $this->day1 = new Solution();

        $this->array = $this->day1->read();
    }

    public function testSolution1(): void
    {
        $this->assertEquals(1139, $this->day1->solution1($this->array));
    }

    public function testSolution2(): void
    {
        $this->assertEquals(1103, $this->day1->solution2($this->array));
    }
}