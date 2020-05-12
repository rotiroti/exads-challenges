<?php


namespace Rotiroti\Exads\MissingElement;

use InvalidArgumentException;

/**
 * Class RandomMissingElement
 * @package Rotiroti\Exads\MissingElement
 */
final class RandomMissingElement
{
    /**
     * Return a random list of integers.
     *
     * All the integers within the list are unique.
     *
     * @param int $n
     * @return array
     * @throws InvalidArgumentException
     */
    public function unique(int $n = 500): array
    {
        if ($n < 1) {
            throw new InvalidArgumentException("argument 'n' should be greater than 0");
        }

        $sequence = range(1, $n);
        shuffle($sequence);

        return $sequence;
    }

    /**
     * Return a random list of integers.
     *
     * The
     *
     * @param int $n
     * @return array
     * @throws InvalidArgumentException
     */
    public function duplicates(int $n = 500): array
    {
        if ($n < 1) {
            throw new InvalidArgumentException("argument 'n' should be greater than 0");
        }

        $sequence = [];

        for ($i = 0; $i < $n; $i++) {
            $sequence[] = mt_rand(1, $n);
        }

        return $sequence;
    }

    /**
     * Find a missing element in a random sequence after removing it.
     *
     * @param $sequence
     * @return int
     * @throws InvalidArgumentException
     */
    public function find($sequence): int
    {
        if (empty($sequence)) {
            throw new InvalidArgumentException("argument 'sequence' must be an array with size > 0");
        }

        $missing = 0;
        $n = count($sequence);

        /**
         * The idea behind this algorithm is based on the use of the XOR operator.
         * Basically, the combined occurrence of each element is twice, one in the
         * original $sequence and other in the newly generated array $new_sequence,
         * except one element which has a single occurrence in $sequence.
         *
         * The XOR operator when applied to the same element return zero
         *
         * $a = 4;
         * $result = $a ^ $a;
         *
         * $result == 0;
         *
         * so we can applied the XOR operator on all the elements of both sequences
         * and the result will contain the missing number.
         *
         * NOTE:
         *
         * In case the sequence contains only unique elements, an alternative solution
         * consists of using the Gauss formula -- no array_sum() invocation -- to calculate
         * the sum of all the elements in the original sequence.
         *
         * Then, iterate over each element in the newly sequence and subtract each element
         * from the sum. At the end, the sum will contain the missing number.
         *
         * However, this approach can generate overflow when the sequence contains
         * a huge number of elements,
         */
        for ($i = 0; $i < $n; $i++) {
            $missing = $missing ^ $sequence[$i];
        }

        unset($sequence[mt_rand(0, $n - 1)]);
        $new_sequence = array_values($sequence);

        for ($i = 0; $i < $n - 1; $i++) {
            $missing = $missing ^ $new_sequence[$i];
        }

        return $missing;
    }
}
