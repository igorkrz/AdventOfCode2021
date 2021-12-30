<?php

namespace App\Model\Day14;

class Polymer
{
    private array $rules;

    private string $template;

    private array $letters;

    private array $pairs;

    /**
     * @param int $steps
     * @return void
     */
    public function part2(int $steps)
    {
        $this->prepareLetters();

        for ($i = 0; $i < $steps; $i++) {
            $result = array_map(fn () => 0, $this->rules);

            foreach ($this->pairs as $pair => $value) {
                $letter = $this->rules[$pair];

                $this->letters[$letter] = isset($this->letters[$letter]) ? $this->letters[$letter] + $value : 1;

                $result[$pair[0] . $letter] += $value;
                $result[$letter . $pair[1]] += $value;
            }

            $this->pairs = $result;
        }
    }

    /**
     * @return int
     */
    public function getSolutionPart2(): int
    {
        return max($this->letters) - min($this->letters);
    }

    /**
     * @return void
     */
    private function prepareLetters()
    {
        foreach (str_split($this->template) as $letter) {
            $this->letters[$letter] = isset($this->letters[$letter]) ? $this->letters[$letter] + 1 : 1;
        }

        $this->pairs = array_map(fn () => 0, $this->rules);

        for ($i = 1; $i < strlen($this->template); $i++) {
            $pair = $this->template[$i - 1] . $this->template[$i];
            $this->pairs[$pair] += 1;
        }
    }

    /**
     * Part 1
     *
     * @param int $steps
     * @return void
     */
    public function createNewTemplate(int $steps)
    {
        for ($step = 0; $step < $steps; $step ++) {
            $newTemplate = '';

            for ($i = 1; $i < strlen($this->template); $i++) {
                $pair = $this->template[$i - 1] . $this->template[$i];
                $first = $this->template[$i - 1];

                $newTemplate .= $first . $this->rules[$pair];
            }

            $this->template = $newTemplate . substr($this->template, -1, 1);
        }
    }

    /**
     * Part 1
     *
     * @return int
     */
    public function getSolution(): int
    {
        $numberOfChars = count_chars($this->template, 1);

        return max($numberOfChars) - min($numberOfChars);
    }

    /**
     * @param array $rules
     */
    public function setRules(array $rules): void
    {
        $this->rules = $rules;
    }

    /**
     * @param string $template
     */
    public function setTemplate(string $template): void
    {
        $this->template = $template;
    }
}