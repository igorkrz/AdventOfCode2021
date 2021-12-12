<?php

namespace App\Model\Day4;

class Board
{
    /**
     * @var array
     */
    private array $board;

    /**
     * @var int[][]
     */
    private array $ticket = [
        [0,0,0,0,0],
        [0,0,0,0,0],
        [0,0,0,0,0],
        [0,0,0,0,0],
        [0,0,0,0,0]
    ];

    public function __construct(array $board)
    {
        $this->board = $board;
    }

    /**
     * If all elements are set to minus return true
     * @return bool
     */
    public function isWinningTicket(): bool
    {
        for ($index = 0; $index < 5; $index++) {
            if (array_sum($this->ticket[$index]) == -5) {
                return true;
            }
            if (array_sum(array_column($this->ticket, $index)) == -5) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if number exists in the current board and set its value to -1
     * @param int $number
     * @return void
     */
    public function search(int $number): void
    {
        $row = false;
        $column = false;

        // Check if number exists in the current board
        for ($index = 0; $index < 5; $index++) {
            if (in_array($number, $this->board[$index])) {
                $row = $index;
            }
            if (in_array($number, array_column($this->board, $index))) {
                $column = $index;
            }
        }

        if (!(is_bool($row) && is_bool($column))) {
            // Set the number on the ticket to minus
            $this->ticket[$row][$column] = -1;
        }
    }

    /**
     * Calculate sum of the remaining numbers on the board
     * @return int
     */
    public function calculateSum(): int
    {
        $sum = 0;

        for ($row = 0; $row < 5; $row++) {
            for ($column = 0; $column < 5; $column++) {
                if (!$this->ticket[$row][$column]) {
                    $sum += $this->board[$row][$column];
                }
            }
        }

        return $sum;
    }
}