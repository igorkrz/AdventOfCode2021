<?php


namespace App\Puzzle\Day4;


use App\Model\AbstractPuzzle;
use App\Model\Day4\Bingo;
use App\Model\Day4\Board;

class Solution extends AbstractPuzzle
{
    /**
     * @inheritDoc
     */
    public function solution1(array $array = []): string
    {
        $bingo = $this->mapInputToBingo($array);

        foreach ($bingo->getWinningNumbers() as $winningNumber) {
            $bingo->play($winningNumber);
            $firstWin = $bingo->getFirstWin();

            if ($firstWin instanceof Board) {
                return (string)($firstWin->calculateSum() * $winningNumber);
            }
        }

        return '';
    }

    /**
     * @inheritDoc
     */
    public function solution2(array $array = []): string
    {
        $bingo = $this->mapInputToBingo($array);

        foreach ($bingo->getWinningNumbers() as $winningNumber) {
            $bingo->play($winningNumber);
            $lastWin = $bingo->getLastWin();

            if ($lastWin instanceof Board) {
                return (string)($lastWin->calculateSum() * $winningNumber);
            }
        }

        return "";
    }

    /**
     * Reads boards from the input and maps it to the Bingo class
     * @param array $array
     * @return Bingo
     */
    private function mapInputToBingo(array $array): Bingo
    {
        $bingo = new Bingo();
        $bingo->setWinningNumbers(explode(",", explode(" ", $array[0])[0]));

        // Remove first and second line so that empty string matches a new board
        array_shift($array);
        array_shift($array);

        $boards = [];
        $index = 0;

        // Find all numbers in the input array and append them to the boards array
        foreach ($array as $item) {
            // Empty string means new board
            if ($item != "") {
                // Find all numbers
                preg_match_all("/\d+/m", $item, $matches);
                $boards[$index][] = array_map('intval', $matches[0]);
            }
            else {
                $index ++;
            }
        }

        // Add boards to the Bingo class
        foreach ($boards as $board) {
            $bingo->addBoard(new Board($board));
        }

        return $bingo;
    }
}