<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Services\CalculatorService;

use Tests\TestCase;

class CalculatorServiceTest extends TestCase
{
    protected $calculatorService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->calculatorService = new CalculatorService();
    }

    /**
     * Test add operation.
     * 
     * @group calculator
     * @dataProvider additionDataProvider
     * @return void
     */
    public function testAddition($a, $b, $expectedResult, $precision = null)
    {
        $result = $this->calculatorService->add($a, $b);

        if ($precision !== null) {
            $this->assertEquals(round($expectedResult, $precision), round($result, $precision), "La suma de $a y $b debería ser $expectedResult");
        } else {
            $this->assertEquals($expectedResult, $result, "La suma de $a y $b debería ser $expectedResult");
        }
    }

    public function additionDataProvider()
    {
        return [
            [5, 6, 11],
            [-10, 20, 10],
            [0, 0, 0],
            [0, -10, -10],
            [-10, 0, -10],
            [-10, -10, -20],
            [10, -10, 0],
            [5.2, 6.4, 11.6, 1],
            [1.111, 2.222, 3.333, 3],
            [0.1, 0.2, 0.3, 1],
            [PHP_INT_MAX, PHP_INT_MAX, 2 * PHP_INT_MAX],
            [PHP_INT_MAX, -PHP_INT_MAX, 0],
            ["5,5", 6, 11.5],
            ["5,5", "6.5", 12],
        ];
    }

    /**
     * Test subtract operation.
     * 
     * @group calculator
     * @dataProvider subtractionDataProvider
     * @return void
     */
    public function testSubtraction($a, $b, $expectedResult)
    {
        $result = $this->calculatorService->subtract($a, $b);
        $this->assertEquals($expectedResult, $result, "La resta de $a y $b debería ser $expectedResult");
    }

    public function subtractionDataProvider()
    {
        return [
            [5, 6, -1],
            [20, -10, 30],
            [0, 0, 0],
            [0, 10, -10],
            [0, -10, 10],
            [-10, 0, -10],
            [-10, -10, 0],
            [10, -10, 20],
            [-10, 10, -20],
            [PHP_INT_MAX, PHP_INT_MAX, 0],
            [PHP_INT_MAX, -PHP_INT_MAX, 2 * PHP_INT_MAX],
            ["5,5", 6, -0.5],
            ["5,5", "6.5", -1],
        ];
    }

    /**
     * Test multiply operation.
     * 
     * @group calculator
     * @dataProvider multiplicationDataProvider
     * @return void
     */
    public function testMultiplication($a, $b, $expectedResult)
    {
        $result = $this->calculatorService->multiply($a, $b);
        $this->assertEquals($expectedResult, $result, "La multiplicación de $a por $b debería ser $expectedResult");
    }

    public function multiplicationDataProvider()
    {
        return [
            [5, 6, 30],
            [-5, 6, -30],
            [5, -6, -30],
            [-5, -6, 30],
            [0, 0, 0],
            [10, 0, 0],
            [0, -10, 0],
            ["5,5", 6, 33],
            ["5,5", "6.5", 35.75],
        ];
    }

    /**
     * Test divide operation.
     * 
     * @group calculator
     * @dataProvider divisionDataProvider
     * @return void
     */
    public function testDivision($a, $b, $expectedResult)
    {
        if ($expectedResult === 'exception') {
            $this->expectException(\InvalidArgumentException::class);
            $this->calculatorService->divide($a, $b);
        } else {
            $result = $this->calculatorService->divide($a, $b);
            $this->assertEquals($expectedResult, $result, "La división de $a entre $b debería ser $expectedResult");
        }
    }


    public function divisionDataProvider()
    {
        return [
            [6, 2, 3],
            [10, 3, 3.3333333333333335],
            [0, 1, 0],
            [0, -10, 0],
            [-10, 1, -10],
            [-10, 2, -5],
            [PHP_INT_MAX,PHP_INT_MAX,1],
            ["6,5", 1, 6.5],
            ["6,5", "1.5", 4.333333333333333],
            
        ];
    }

    /**
     * Test divide operation.
     * 
     * @group calculator
     * @dataProvider divisionByZeroDataProvider
     * @return void
     */
    public function testDivisionByZero($a, $b)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->calculatorService->divide($a, $b);
    }

    /**
     * Data provider for testing division by zero.
     * 
     * @group calculator
     * @return array
     */
    public function divisionByZeroDataProvider()
    {
        return [
            [6, 0],
            [10, 0],
            [-10, 0],
            [0, 0],
            ["6,5", 0],
            ["6.5", 0],
        ];
    }

    /**
     * Test power operation.
     * 
     * @group calculator
     * @dataProvider powerDataProvider
     * @return void
     */
    public function testPower($a, $b, $expectedResult)
    {
        $result = $this->calculatorService->power($a, $b);
        $this->assertEquals($expectedResult, $result, "El resultado de $a elevado a $b debería ser $expectedResult");
    }

    public function powerDataProvider()
    {
        return [
            [2, 3, 8],
            [2, 0, 1],
            [0, 0, 1],
            [0, 2, 0],
            [-2, 3, -8],
            [-2, -3, -0.125],
            [-2, 0, 1],
            [10, "1,8", 63.09573444801933],
            ["10.1", "-1,8", 0.015567595091136753],
        ];
    }

    /**
     * Test percentage operation.
     * 
     * @group calculator
     * @dataProvider percentageDataProvider
     * @return void
     */
    public function testPercentage($percentage, $total, $expectedResult)
    {
        $result = $this->calculatorService->percentage($percentage, $total);
        $this->assertEquals($expectedResult, $result, "El porcentaje de $percentage sobre $total debería ser $expectedResult");
    }

    public function percentageDataProvider()
    {
        return [
            [50, 100, 50],
            [150, 100, 150],
            [30, 100, 30],
            [0, 100, 0],
            [-50, 100, -50],
            ["50,5", "100,5", 50.7525],
            ["50.5", "100,5", 50.7525],
        ];
    }

    /**
     * Test average operation.
     * 
     * @group calculator
     * @dataProvider averageDataProvider
     * @return void
     */
    public function testAverage($values, $expectedResult)
    {
        $result = $this->calculatorService->average(...$values);
        $this->assertEquals($expectedResult, $result, "El promedio de [" . implode(", ", $values) . "] debería ser $expectedResult");
    }

    public function averageDataProvider()
    {
        return [
            [[10, 20, 30, 40, 50], 30],
            [[5], 5],
            [[-10, -20, -30], -20],
            [[], 0],
            [["10,5", "20,5"], 15.5],
            [["10.5", "20,5"], 15.5],
        ];
    }


}
