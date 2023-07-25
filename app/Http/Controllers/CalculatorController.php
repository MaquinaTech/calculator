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
        try {
            $result = $this->calculatorService->add($operatorA, $operatorB);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return response()->json(['result' => $result]);
    }

    public function subtract($operatorA, $operatorB)
    {
        try {
            $result = $this->calculatorService->subtract($operatorA, $operatorB);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        return response()->json(['result' => $result]);
    }

    public function multiply($operatorA, $operatorB)
    {
        try{
            $result = $this->calculatorService->multiply($operatorA, $operatorB);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
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

    public function power($operatorA, $operatorB)
    {
        try {
            $result = $this->calculatorService->power($operatorA, $operatorB);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        return response()->json(['result' => $result]);
    }

    public function percentage($operatorA, $operatorB)
    {   
        try {
            $result = $this->calculatorService->percentage($operatorA, $operatorB);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        return response()->json(['result' => $result]);
    }

    public function average($operatorA, $operatorB)
    {
        try {
            $result = $this->calculatorService->average($operatorA, $operatorB);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        return response()->json(['result' => $result]);
    }

}
