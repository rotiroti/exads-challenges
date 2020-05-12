<?php declare(strict_types=1);

namespace Rotiroti\Exads\FizzBuzz;

/**
 * Class FizzBuzz
 * @package Rotiroti\Exads\FizzBuzz
 */
final class FizzBuzz
{
    /**
     * Run the FizzBuzz game
     *
     * @param int $n
     * @return array|string[]
     */
    public function run(int $n = 100)
    {
        if ($n > 0) {
            return array_map(function ($i) {
                return $this->rules($i);
            }, range(1, $n));
        }

        return [];
    }

    /**
     * FizzBuzz rules game.
     *
     * @param $number
     * @return string
     */
    private function rules($number): string
    {
        if ($number % 15 === 0) {
            return "FizzBuzz";
        }
        if ($number % 3 === 0) {
            return "Fizz";
        }
        if ($number % 5 === 0) {
            return "Buzz";
        }

        return "$number";
    }
}
