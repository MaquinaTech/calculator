<?php

namespace App\Http\Controllers;

use App\Services\CalculatorService;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    protected $calculatorService;

    public function __construct(CalculatorService $calculatorService)
    {
        $this->calculatorService = $calculatorService;
    }

    public function add($operatorA, $operatorB)
    {
        $result = $this->calculatorService->add($operatorA, $operatorB);
        return response()->json(['result' => $result]);
    }

    public function subtract($operatorA, $operatorB)
    {
        $result = $this->calculatorService->subtract($operatorA, $operatorB);
        return response()->json(['result' => $result]);
    }

    public function multiply($operatorA, $operatorB)
    {
        $result = $this->calculatorService->multiply($operatorA, $operatorB);
        return response()->json(['result' => $result]);
    }

    public function divide($operatorA, $operatorB)
    {
        try {
            $result = $this->calculatorService->divide($operatorA, $operatorB);
            return response()->json(['result' => $result]);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    // Implementa aquí otros métodos para el resto de operaciones matemáticas (power, percentage, average, etc.)

    public function power($operatorA, $operatorB)
    {
        $result = $this->calculatorService->power($operatorA, $operatorB);
        return response()->json(['result' => $result]);
    }

    public function percentage($operatorA, $operatorB)
    {
        $result = $this->calculatorService->percentage($operatorA, $operatorB);
        return response()->json(['result' => $result]);
    }

    public function average($operatorA, $operatorB)
    {
        $result = $this->calculatorService->average($operatorA, $operatorB);
        return response()->json(['result' => $result]);
    }

}
