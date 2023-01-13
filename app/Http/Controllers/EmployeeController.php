<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index', [
            'employees' => Employee::orderBy('rank', 'ASC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'rank' => 'required',
            'address' => 'required',
            'mobile' => 'required|unique:employees',
        ]);
        Employee::employeeUpdateOrCreate($request);
        return redirect()->back()->with('success', 'Employee Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('employee.edit',[
           'employee' => Employee::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'rank' => 'required',
            'address' => 'required',
            'mobile' => [
                'required',
                Rule::unique('employees')->ignore($id),
            ],
        ]);
        Employee::employeeUpdateOrCreate($request, $id);
        return redirect()->route('employees.index')->with('success', 'Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect()->route('employees.index')->with('success', 'Employee Deleted Successfully');
    }

    public function changeStatus($id){
        $employee = Employee::find($id);
        if($employee->status == 1){
            $employee->status = 0 ;
            $message = 'Employee status deactivated';
        }elseif($employee->status == 0){
            $employee->status = 1 ;
            $message = 'Employee status activated';
        }
        $employee->save();
        return redirect()->back()->with('success', $message);
    }



}
