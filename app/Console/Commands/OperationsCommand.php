<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CalculatorService;

class OperationsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'operations {operatorA : The first operator} {operatorB : The second operator} {operation : The operation to perform}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perform a mathematical operation';

    // Property to hold the CalculatorService instance
    protected $calculatorService;

    /**
     * Create a new command instance.
     * 
     * @param CalculatorService $calculatorService
     * 
     * @return void
     */
    public function __construct(CalculatorService $calculatorService)
    {
        parent::__construct();
        $this->calculatorService = $calculatorService;
    }

    /**
     * Execute the console command.
     * 
     * @return int
     * @throws \InvalidArgumentException When invalid operation is provided
     */
    public function handle()
    {
        $operatorA = $this->argument('operatorA');
        $operatorB = $this->argument('operatorB');
        $operation = $this->argument('operation');

        switch ($operation) {
            case 'add':
                try {
                    $result = $this->calculatorService->add($operatorA, $operatorB);
                } catch (\InvalidArgumentException $e) {
                    $this->error($e->getMessage());
                    return 1;
                }
                break;
            case 'subtract':
                try {
                    $result = $this->calculatorService->subtract($operatorA, $operatorB);
                } catch (\InvalidArgumentException $e) {
                    $this->error($e->getMessage());
                    return 1;
                }
                break;
            case 'multiply':
                try {
                    $result = $this->calculatorService->multiply($operatorA, $operatorB);
                } catch (\InvalidArgumentException $e) {
                    $this->error($e->getMessage());
                    return 1;
                }
                break;
            case 'divide':
                try {
                    $result = $this->calculatorService->divide($operatorA, $operatorB);
                } catch (\InvalidArgumentException $e) {
                    $this->error($e->getMessage());
                    return 1;
                }
                break;
            case 'power':
                try {
                    $result = $this->calculatorService->power($operatorA, $operatorB);
                } catch (\InvalidArgumentException $e) {
                    $this->error($e->getMessage());
                    return 1;
                }
                break;
            case 'percentage':
                try {
                    $result = $this->calculatorService->percentage($operatorA, $operatorB);
                } catch (\InvalidArgumentException $e) {
                    $this->error($e->getMessage());
                    return 1;
                }
                break;
            case 'average':
                try {
                    $result = $this->calculatorService->average($operatorA, $operatorB);
                } catch (\InvalidArgumentException $e) {
                    $this->error($e->getMessage());
                    return 1;
                }
                break;
            default:
                $this->error("Invalid operation. Available operations: add, subtract, multiply, divide, power, percentage, average");
                return 1;
        }

        $this->info("Result: " . $result);
        return 0;
    }
}
