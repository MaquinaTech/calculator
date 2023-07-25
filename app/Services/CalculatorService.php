<?php

namespace App\Services;
use App\Models\Operation;

class CalculatorService
{

    /**
     * Valid operations.
     *
     * @var array
     */
    protected $validOperations = ['add', 'subtract', 'multiply', 'divide', 'power', 'percentage', 'average'];

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
        $a = $this->normalizeNumber($a);
        $b = $this->normalizeNumber($b);

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
        $a = $this->normalizeNumber($a);
        $b = $this->normalizeNumber($b);

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
        $a = $this->normalizeNumber($a);
        $b = $this->normalizeNumber($b);
      
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
        if ($b === 0) {
          throw new \InvalidArgumentException("Division by zero is not allowed.");
        }
        
        // Control comma and dot in numbers.
        $a = $this->normalizeNumber($a);
        $b = $this->normalizeNumber($b);

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
        $base = $this->normalizeNumber($base);
        $exponent = $this->normalizeNumber($exponent);
        
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
        $percentage = $this->normalizeNumber($percentage);
        $total = $this->normalizeNumber($total);
        
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
            // Control comma and dot in numbers.
            $value = $this->normalizeNumber($value);
            $values[$key] = (float) $value;
        }

        return array_sum($values) / count($values);
    }

    /**
     * Convert comma to dot in numbers if necessary and check if number is numeric.
     *
     * @param float|int $number
     * @return float|int
     * @throws \InvalidArgumentException When invalid number is provided
     */
    private function normalizeNumber($number)
    {
        if (is_string($number) && strpos($number, ',') !== false) {
            $number = str_replace(',', '.', $number);
        }
        if (!is_numeric($number)) {
          throw new \InvalidArgumentException("Invalid number, please enter a valid number.");
        }
        return (float) $number;
    }

    /**
     * Check if operation is valid.
     * 
     * @param string $operation
     * @return bool
     * @throws \InvalidArgumentException When invalid operation is provided
     */
    public function isValidOperation($operation)
    {
        if (!in_array($operation, $this->validOperations)) {
            throw new \InvalidArgumentException("Invalid operation, please enter a valid operation.");
        }
        return true;
        
    }

    /**
     * Save operation in database.
     *
     * @param float|int $operatorA
     * @param float|int $operatorB
     * @param string $operation
     * @param float|int $result
     * @return void
     * @throws \InvalidArgumentException When invalid operation is provided or invalid number is provided
     */
    public function saveOperation($operatorA, $operatorB, $operation, $result)
    {
        // Control comma and dot in numbers.
        $operatorA = $this->normalizeNumber($operatorA);
        $operatorB = $this->normalizeNumber($operatorB);
        $result = $this->normalizeNumber($result);

        // Control valid operation
        $this->isValidOperation($operation);

        // Save operation in database
        Operation::create([
            'operation' => $operation,
            'operatorA' => $operatorA,
            'operatorB' => $operatorB,
            'result' => $result,
        ]);
    }


}