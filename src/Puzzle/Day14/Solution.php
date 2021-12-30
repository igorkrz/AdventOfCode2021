<?php


namespace App\Puzzle\Day14;


use App\Model\AbstractPuzzle;
use App\Model\Day14\Polymer;

class Solution extends AbstractPuzzle
{
    /**
     * @inheritDoc
     */
    public function solution1(array $array = []): string
    {
        $polymer = $this->createPolymer($array);
        $polymer->createNewTemplate(10);

        return (string)$polymer->getSolution();
    }

    /**
     * @inheritDoc
     */
    public function solution2(array $array = []): string
    {
        $polymer = $this->createPolymer($array);
        $polymer->part2(40);

        return (string)$polymer->getSolutionPart2();
    }

    /**
     * @param array $array
     * @return Polymer
     */
    private function createPolymer(array $array): Polymer
    {
        $polymer = new Polymer();
        $template = array_shift($array);
        $polymer->setTemplate($template);
        array_shift($array);

        $rules = [];
        foreach ($array as $item) {
            $rule = explode(' -> ', $item);
            $rules[$rule[0]] = $rule[1];
        }

        $polymer->setRules($rules);

        return $polymer;
    }
}