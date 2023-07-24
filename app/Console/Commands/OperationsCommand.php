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
     */
    public function handle()
    {
        $operatorA = $this->argument('operatorA');
        $operatorB = $this->argument('operatorB');
        $operation = $this->argument('operation');

        switch ($operation) {
            case 'add':
                $result = $this->calculatorService->add($operatorA, $operatorB);
                break;
            case 'subtract':
                $result = $this->calculatorService->subtract($operatorA, $operatorB);
                break;
            case 'multiply':
                $result = $this->calculatorService->multiply($operatorA, $operatorB);
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
                $result = $this->calculatorService->power($operatorA, $operatorB);
                break;
            case 'percentage':
                $result = $this->calculatorService->percentage($operatorA, $operatorB);
                break;
            case 'average':
                $result = $this->calculatorService->average($operatorA, $operatorB);
                break;
            default:
                $this->error("Invalid operation. Available operations: add, subtract, multiply, divide, power, percentage, average");
                return 1;
        }

        $this->info("Result: " . $result);
        return 0;
    }
}
