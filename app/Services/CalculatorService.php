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
     * @throws \InvalidArgumentException When invalid number is provided
     */
    public function add($a, $b)
    {
        // Control comma and dot in numbers.
        if (strpos($a, ',') !== false) {
            $a = str_replace(',', '.', $a);
        }
        if(strpos($b, ',') !== false){
            $b = str_replace(',', '.', $b);  
        }
        
        //Control format data
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new \InvalidArgumentException("Invalid number, please enter a valid number.");
        }

        return $a + $b;
    }

    /**
     * Perform subtraction.
     *
     * @param float|int $a
     * @param float|int $b
     * @return float|int
     * @throws \InvalidArgumentException When invalid number is provided
     */
    public function subtract($a, $b)
    {
        // Control comma and dot in numbers.
        if (strpos($a, ',') !== false) {
            $a = str_replace(',', '.', $a);
        }
        if(strpos($b, ',') !== false){
            $b = str_replace(',', '.', $b);  
        }

        //Control format data
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new \InvalidArgumentException("Invalid number, please enter a valid number.");
        }

        return $a - $b;
    }

    /**
     * Perform multiplication.
     *
     * @param float|int $a
     * @param float|int $b
     * @return float|int
     * @throws \InvalidArgumentException When invalid number is provided
     */
    public function multiply($a, $b)
    {
        // Control comma and dot in numbers.
        if (strpos($a, ',') !== false) {
            $a = str_replace(',', '.', $a);
        }
        if(strpos($b, ',') !== false){
            $b = str_replace(',', '.', $b);  
        }
        
        //Control format data
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new \InvalidArgumentException("Invalid number, please enter a valid number.");
        }
      
        return $a * $b;
    }

    /**
     * Perform division.
     *
     * @param float|int $a
     * @param float|int $b
     * @return float|int
     * @throws \InvalidArgumentException When division by zero is attempted or invalid number is provided
     */
    public function divide($a, $b)
    {
        // Control comma and dot in numbers.
        if (strpos($a, ',') !== false) {
            $a = str_replace(',', '.', $a);
        }
        if(strpos($b, ',') !== false){
            $b = str_replace(',', '.', $b);  
        }
        
        if ($b === 0) {
            throw new \InvalidArgumentException("Division by zero is not allowed.");
        }
        
        // Control format data
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new \InvalidArgumentException("Invalid number, please enter a valid number.");
        }

        return $a / $b;
    }

    /**
     * Perform power operation.
     *
     * @param float|int $base
     * @param float|int $exponent
     * @return float|int
     * @throws \InvalidArgumentException When invalid number is provided
     */
    public function power($base, $exponent)
    {
        // Control comma and dot in numbers.
        if (strpos($base, ',') !== false) {
            $base = str_replace(',', '.', $base);
        }
        if(strpos($exponent, ',') !== false){
            $exponent = str_replace(',', '.', $exponent);
        }
        //Control format data
        if (!is_numeric($base) || !is_numeric($exponent)) {
            throw new \InvalidArgumentException("Invalid number, please enter a valid number.");
        }
        
        return pow($base, $exponent);
    }

    /**
     * Calculate percentage.
     *
     * @param float|int $percentage
     * @param float|int $total
     * @return float|int
     * @throws \InvalidArgumentException When invalid number is provided
     */
    public function percentage($percentage, $total)
    {
        // Control comma and dot in numbers.
        if (strpos($percentage, ',') !== false) {
            $percentage = str_replace(',', '.', $percentage);
        }
        if(strpos($total, ',') !== false){
            $total = str_replace(',', '.', $total);  
        }

        //Control format data
        if (!is_numeric($percentage) || !is_numeric($total)) {
            throw new \InvalidArgumentException("Invalid number, please enter a valid number.");
        }
        
        return ($percentage / 100) * $total;
    }

    /**
     * Calculate average.
     *
     * @param float|int ...$values
     * @return float|int
     * @throws \InvalidArgumentException When invalid number is provided
     */
    public function average(...$values)
    {
        if (count($values) === 0) {
            return 0;
        }
        //Control format data
        foreach ($values as $key => $value) {
            if (!is_numeric($value)) {
              // Control comma and dot in numbers.
              if (strpos($value, ',') !== false) {
                  $value = str_replace(',', '.', $value);
              }
              $values[$key] = (float) $value;
            }
        }

        return array_sum($values) / count($values);
    }
}
