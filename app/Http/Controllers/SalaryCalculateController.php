<?php

namespace App\Http\Controllers;

use App\Models\SalaryScale;
use Illuminate\Http\Request;

class SalaryCalculateController extends Controller
{

    public function calculateSalaryResult(Request $request){
        
        $this->validate($request, [
            'low_basic_salary' => 'required',
        ]);

        SalaryScale::salaryScaleUpdateOrCreated($request);
        return redirect()->back()->with('success', 'Salary scale created successfully');
    }

    





}
