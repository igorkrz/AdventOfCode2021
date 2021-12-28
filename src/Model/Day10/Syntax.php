<?php

namespace App\Model\Day10;

class Syntax
{
    private const CHARS = [
        '(' => ')',
        '[' => ']',
        '{' => '}',
        '<' => '>',
    ];

    private const SCORES = [
        ')' => 3,
        ']' => 57,
        '}' => 1197,
        '>' => 25137,
        '(' => 1,
        '[' => 2,
        '{' => 3,
        '<' => 4,
    ];

    private int $score = 0;

    /**
     * @var int[]
     */
    private array $scores;

    /**
     * @var string[]
     */
    private array $patterns = ['%\(\)%', '%\[]%', '%{}%', '%<>%'];

    private string $line;

    /**
     * @param string $line
     * @return void
     */
    public function checkCorrupted(string $line)
    {
        $this->replace($line);

        foreach (str_split($this->line) as $char) {
            if (in_array($char, self::CHARS)) {
                $this->score += self::SCORES[$char];
                return;
            }
        }
    }

    /**
     * @param string $line
     * @return void
     */
    public function checkIncomplete(string $line)
    {
        $this->replace($line);
        $this->score = 0;

        if (!$this->isCorrupted()) {
            foreach (array_reverse(str_split($this->line)) as $char) {
                $this->score = (int)($this->score * 5 + self::SCORES[$char]);
            }
        }

        if ($this->score !== 0) {
            $this->scores[] = $this->score;
        }
    }

    /**
     * @param string $line
     * @return void
     */
    private function replace(string $line): void
    {
        do {
            $line = preg_replace($this->patterns, '', $line);

            $isReplaceable = false;

            foreach ($this->patterns as $pattern) {
                if (preg_match($pattern, $line)) {
                    $isReplaceable = true;
                    break;
                }
            }
        } while ($isReplaceable);

        $this->line = $line;
    }

    /**
     * @return bool
     */
    private function isCorrupted(): bool
    {
        foreach (str_split($this->line) as $char) {
            if (in_array($char, self::CHARS)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return int
     */
    public function getCorruptedScore(): int
    {
        return $this->score;
    }

    /**
     * @return int
     */
    public function getMiddleScore(): int
    {
        sort($this->scores);
        return $this->scores[floor(count($this->scores) / 2)];
    }

}