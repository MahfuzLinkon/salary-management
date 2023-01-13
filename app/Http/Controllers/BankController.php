<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bank.index', [
            'accounts' => BankAccount::orderBy('account_number', 'ASC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank.create', [
            'employees' => Employee::orderBy('name', 'ASC')->get(),
        ]);
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
            'employee_id' => 'required|unique:bank_accounts',
            'account_type' => 'required',
            'account_number' => 'required|unique:bank_accounts',
            'bank_name' => 'required',
            'branch_name' => 'required',
        ],[
            'employee_id.required' => 'Employee Name is required',
            'employee_id.unique' => 'Employee Account Already Created',
        ]);
        BankAccount::bankAccountUpdateOrCreate($request);
        return redirect()->back()->with('success', 'Account Created Successfully');
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
        return view('bank.edit', [
            'account' => BankAccount::where('id',$id)->first(),
            'employees' => Employee::orderBy('name', 'ASC')->get(),
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
            'employee_id' => [
                'required',
                Rule::unique('bank_accounts')->ignore($id),
            ],
            'account_type' => 'required',
            'account_number' => [
                'required',
                Rule::unique('bank_accounts')->ignore($id),
            ],
            'bank_name' => 'required',
            'branch_name' => 'required',
        ],[
            'employee_id.required' => 'Employee Name is required',
            'employee_id.unique' => 'Employee Account Already Created',
        ]);

        BankAccount::bankAccountUpdateOrCreate($request, $id);
        return redirect()->route('bank-accounts.index')->with('success', 'Account Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BankAccount::find($id)->delete();
        return redirect()->route('bank-accounts.index')->with('success', 'Account Deleted Successfully');
    }

    public function changeStatus($id){
        $bankAccount = BankAccount::find($id);
        if($bankAccount->status == 1){
            $bankAccount->status = 0 ;
            $message = 'Account status deactivated';
        }elseif($bankAccount->status == 0){
            $bankAccount->status = 1 ;
            $message = 'Account status activated';
        }
        $bankAccount->save();
        return redirect()->back()->with('success', $message);
    }


}
