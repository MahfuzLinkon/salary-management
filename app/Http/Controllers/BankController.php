<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
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
            'accounts' => BankAccount::orderBy('account_name', 'ASC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank.create');
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
            'account_name' => 'required',
            'account_type' => 'required',
            'account_number' => 'required|unique:bank_accounts',
            'bank_name' => 'required',
            'branch_name' => 'required',
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
            'account_name' => 'required',
            'account_type' => 'required',
            'account_number' => [
                'required',
                Rule::unique('bank_accounts')->ignore($id),
            ],
            'bank_name' => 'required',
            'branch_name' => 'required',
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
}
