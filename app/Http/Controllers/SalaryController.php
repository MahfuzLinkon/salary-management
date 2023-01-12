<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SalaryScale;
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
        $employees = Employee::where('rank', $rank)->get();
        return response()->json($employees);
    }

    public function getEmployeeAccount(Request $request){
        $employeeId = $request->employee_id;
        $account = Employee::where('id', $employeeId)->first();
        return response()->json($account);
    }

    public function getSalary(Request $request){
        $rank = $request->rank;
        $salary = SalaryScale::where('rank', $rank)->first();
        return response()->json($salary);
    }







}
