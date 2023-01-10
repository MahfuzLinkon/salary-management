<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryCalculateController extends Controller
{
    private $result;

    public function calculateSalaryResult(Request $request){
        
        $this->validate($request, [
            'low_basic_salary' => 'required',
            'ranks' => 'required',
        ]);

        if($request->ranks == 6){
            $basicSalary = $request->low_basic_salary;
            $houseRent = $basicSalary * (20/100);
            $medical = $basicSalary * (15/100);
            $this->result = $basicSalary + $houseRent + $medical;
        }elseif($request->ranks == 5){
            $basicSalary = $request->low_basic_salary + 5000;
            $houseRent = $basicSalary * (20/100);
            $medical = $basicSalary * (15/100);
            $this->result = $basicSalary + $houseRent + $medical;
        }elseif($request->ranks == 4){
            $basicSalary = $request->low_basic_salary + 5000 + 5000;
            $houseRent = $basicSalary * (20/100);
            $medical = $basicSalary * (15/100);
            $this->result = $basicSalary + $houseRent + $medical;
        }elseif($request->ranks == 3){
            $basicSalary = $request->low_basic_salary + 5000 + 5000 + 5000;
            $houseRent = $basicSalary * (20/100);
            $medical = $basicSalary * (15/100);
            $this->result = $basicSalary + $houseRent + $medical;
        }elseif($request->ranks == 2){
            $basicSalary = $request->low_basic_salary + 5000 + 5000 + 5000 + 5000;
            $houseRent = $basicSalary * (20/100);
            $medical = $basicSalary * (15/100);
            $this->result = $basicSalary + $houseRent + $medical;
        }elseif($request->ranks == 1){
            $basicSalary = $request->low_basic_salary + 5000 + 5000 + 5000 + 5000 + 5000;
            $houseRent = $basicSalary * (20/100);
            $medical = $basicSalary * (15/100);
            $this->result = $basicSalary + $houseRent + $medical;
        }
        return redirect()->back()->with('result', $this->result);
        // return $this->result;
    }

    





}
