<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ----------- CalculatorController.php -------------
// add
Route::get('/add/{operatorA}/{operatorB}', [CalculatorController::class, 'add']);
// subtract
Route::get('/subtract/{operatorA}/{operatorB}', [CalculatorController::class, 'subtract']);
// multiply
Route::get('/multiply/{operatorA}/{operatorB}', [CalculatorController::class, 'multiply']);
// divide
Route::get('/divide/{operatorA}/{operatorB}', [CalculatorController::class, 'divide']);
// power
Route::get('/power/{operatorA}/{operatorB}', [CalculatorController::class, 'power']);
// percentage
Route::get('/percentage/{operatorA}/{operatorB}', [CalculatorController::class, 'percentage']);
// average
Route::get('/average/{operatorA}/{operatorB}', [CalculatorController::class, 'average']);
