<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;

class CompanyAccountController extends Controller
{
    public function index(){
        return view('accounts.index', [
            'balance' => BankAccount::where('account_number', 1)->first(),
        ]);
    }

    public function addBalance(Request $request){
        $balance = BankAccount::find(1);
        $balance->current_balance = $balance->current_balance + $request->add_balance;
        $balance->save();
        return redirect()->back()->with('success', 'Balance added to company account successfully');
    }









}
