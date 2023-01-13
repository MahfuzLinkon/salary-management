<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BankController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MainBankController;
use App\Http\Controllers\SalaryCalculateController;
use App\Http\Controllers\SalaryController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/calculate/salary', [FrontendController::class, 'calculateSalary'])->name('calculate.salary');
Route::post('/calculate/salary/result', [SalaryCalculateController::class, 'calculateSalaryResult'])->name('calculate.salary.result');
// Employee all route
Route::resource('employees', EmployeeController::class);
Route::get('employees/change/status/{id}', [EmployeeController::class, 'changeStatus'])->name('employees.change-status');
// Bank account all route
Route::resource('bank-accounts', BankController::class);
Route::get('bank-accounts/change/status/{id}', [BankController::class, 'changeStatus'])->name('bank-accounts.change-status');
// Company Main Accounts All Route
Route::get('/company/account', [MainBankController::class, 'index'])->name('company-account.index');
Route::post('/company/add-balance', [MainBankController::class, 'addBalance'])->name('company-add.balance');
// Pay Salary Route 
Route::get('/pay/salary', [SalaryController::class, 'paySalary'])->name('pay.salary');
Route::post('/get-employee/rank-wish', [SalaryController::class, 'getEmployee'])->name('employee.rank-wish');
Route::post('/get-employee/account', [SalaryController::class, 'getEmployeeAccount'])->name('employee.account');
Route::post('/get-salary/rank-wish', [SalaryController::class, 'getSalary'])->name('salary.rank-wish');
Route::post('/transfer/salary', [SalaryController::class, 'transferSalary'])->name('transfer.salary');
Route::get('/salary/sheet', [SalaryController::class, 'salarySheet'])->name('salary.sheet');

