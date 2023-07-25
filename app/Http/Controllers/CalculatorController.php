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

    /**
     * Perform addition
     * 
     * @param float|int $a
     * @param float|int $b
     * @return \Illuminate\Http\JsonResponse
     * @throws \InvalidArgumentException When invalid number is provided
     */
    public function add($operatorA, $operatorB)
    {
        try {
            $result = $this->calculatorService->add($operatorA, $operatorB);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return response()->json(['result' => $result]);
    }

    /**
     * Perform subtraction.
     * 
     * @param float|int $a
     * @param float|int $b
     * @return \Illuminate\Http\JsonResponse
     * @throws \InvalidArgumentException When invalid number is provided
     */
    public function subtract($operatorA, $operatorB)
    {
        try {
            $result = $this->calculatorService->subtract($operatorA, $operatorB);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        return response()->json(['result' => $result]);
    }

    /**
     * Perform multiplication.
     * 
     * @param float|int $a
     * @param float|int $b
     * @return \Illuminate\Http\JsonResponse
     * @throws \InvalidArgumentException When invalid number is provided
     */
    public function multiply($operatorA, $operatorB)
    {
        try{
            $result = $this->calculatorService->multiply($operatorA, $operatorB);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        return response()->json(['result' => $result]);
    }

    /**
     * Perform division.
     * 
     * @param float|int $a
     * @param float|int $b
     * @return \Illuminate\Http\JsonResponse
     * @throws \InvalidArgumentException When invalid number is provided
     */
    public function divide($operatorA, $operatorB)
    {
        try {
            $result = $this->calculatorService->divide($operatorA, $operatorB);
            return response()->json(['result' => $result]);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Perform power.
     * 
     * @param float|int $a
     * @param float|int $b
     * @return \Illuminate\Http\JsonResponse
     * @throws \InvalidArgumentException When invalid number is provided
     */
    public function power($operatorA, $operatorB)
    {
        try {
            $result = $this->calculatorService->power($operatorA, $operatorB);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        return response()->json(['result' => $result]);
    }

    /**
     * Perform percentage.
     * 
     * @param float|int $a
     * @param float|int $b
     * @return \Illuminate\Http\JsonResponse
     * @throws \InvalidArgumentException When invalid number is provided
     */
    public function percentage($operatorA, $operatorB)
    {   
        try {
            $result = $this->calculatorService->percentage($operatorA, $operatorB);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        return response()->json(['result' => $result]);
    }

    /**
     * Perform average.
     * 
     * @param float|int $a
     * @param float|int $b
     * @return \Illuminate\Http\JsonResponse
     * @throws \InvalidArgumentException When invalid number is provided
     */
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
