<?php

use App\Http\Controllers\BankController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SalaryCalculateController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/calculate/salary', [FrontendController::class, 'calculateSalary'])->name('calculate.salary');
Route::post('/calculate/salary/result', [SalaryCalculateController::class, 'calculateSalaryResult'])->name('calculate.salary.result');


Route::resource('bank-accounts', BankController::class);

