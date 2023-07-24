<?php

namespace App\Services;

class CalculatorService
{
    /**
     * Perform addition.
     *
     * @param float|int $a
     * @param float|int $b
     * @return float|int
     */
    public function add($a, $b)
    {
        return $a + $b;
    }

    /**
     * Perform subtraction.
     *
     * @param float|int $a
     * @param float|int $b
     * @return float|int
     */
    public function subtract($a, $b)
    {
        return $a - $b;
    }

    /**
     * Perform multiplication.
     *
     * @param float|int $a
     * @param float|int $b
     * @return float|int
     */
    public function multiply($a, $b)
    {
        return $a * $b;
    }

    /**
     * Perform division.
     *
     * @param float|int $a
     * @param float|int $b
     * @return float|int
     * @throws \InvalidArgumentException When division by zero is attempted
     */
    public function divide($a, $b)
    {
        if ($b === 0) {
            throw new \InvalidArgumentException("Division by zero is not allowed.");
        }

        return $a / $b;
    }

    /**
     * Perform power operation.
     *
     * @param float|int $base
     * @param float|int $exponent
     * @return float|int
     */
    public function power($base, $exponent)
    {
        return pow($base, $exponent);
    }

    /**
     * Calculate percentage.
     *
     * @param float|int $percentage
     * @param float|int $total
     * @return float|int
     */
    public function percentage($percentage, $total)
    {
        return ($percentage / 100) * $total;
    }

    /**
     * Calculate average.
     *
     * @param float|int ...$values
     * @return float|int
     */
    public function average(...$values)
    {
        if (count($values) === 0) {
            return 0;
        }

        return array_sum($values) / count($values);
    }
}
