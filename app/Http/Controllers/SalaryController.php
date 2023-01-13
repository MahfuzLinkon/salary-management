<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Employee;
use App\Models\SalaryScale;
use App\Models\SalarySheet;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function paySalary(){
        return view('salary.pay-salary', [
            'employees'  => Employee::orderBy('name', 'ASC')->get(),
        ]);
    }

    public function getEmployee(Request $request){
        $rank = $request->rank;
        $employees = Employee::where('rank', $rank)->where('status', 1)->get();
        return response()->json($employees);
    }

    public function getSalary(Request $request){
        $rank = $request->rank;
        $salary = SalaryScale::where('rank', $rank)->first();
        return response()->json($salary);
    }

    public function getEmployeeAccount(Request $request){
        $employeeId = $request->employee_id;
        $account = BankAccount::where('employee_id', $employeeId)->first();
        return response()->json($account);
    }

    public function transferSalary(Request $request){
        $this->validate($request, [
            'rank' => 'required',
            'amount' => 'required',
            'employee_id' => 'required',
            'account_number' => 'required',
        ],[
            'rank.required' => 'Employee rank is required',
            'amount.required' => 'Salary amount is required',
            'employee_id.required' => 'Employee name is required',
            'account_number.required' => 'Account number is required',
        ]);
        // return $request->all();
        $message = SalarySheet::transferSalaryCreate($request);
        return redirect()->back()->with($message['type'], $message['message']);
    }

    public function salarySheet(){
        return view('salary.salary-sheet', [
            'salaries' => SalarySheet::latest()->get(),
        ]);
    }





}
