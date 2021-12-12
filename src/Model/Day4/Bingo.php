<?php


namespace App\Model\Day4;


class Bingo
{
    /**
     * @var array
     */
    private array $winningNumbers;
    /**
     * @var Board[]
     */
    private array $boards;
    /**
     * @var array
     */
    private array $wins = [];

    /**
     * Start playing Bingo!<br>
     * Search for number in the current board and if it is a winning ticket append ti to the wins array
     * @param int $number
     * @return void
     */
    public function play(int $number): void
    {
        foreach ($this->boards as $key => $board) {
            $board->search($number);

            if ($board->isWinningTicket()) {
                if (!in_array($key, $this->wins)) {
                    $this->wins[] = $key;
                }
            }
        }
    }

    /**
     * @return Board|null
     */
    public function getFirstWin(): ?Board
    {
        $first = 0;

        if (isset($this->wins[$first])) {
            return $this->boards[$this->wins[$first]];
        }

        return null;
    }

    /**
     * @return Board|null
     */
    public function getLastWin(): ?Board
    {
        $last = count($this->boards) - 1;

        if (isset($this->wins[$last])) {
            return $this->boards[$this->wins[$last]];
        }

        return null;
    }

    /**
     * @return array
     */
    public function getWinningNumbers(): array
    {
        return $this->winningNumbers;
    }

    /**
     * @param array $winningNumbers
     */
    public function setWinningNumbers(array $winningNumbers): void
    {
        $this->winningNumbers = $winningNumbers;
    }

    /**
     * @param Board $board
     */
    public function addBoard(Board $board): void
    {
        $this->boards[] = $board;
    }
}