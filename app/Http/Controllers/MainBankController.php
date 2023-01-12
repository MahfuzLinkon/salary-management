<?php

namespace App\Http\Controllers;

use App\Models\MainBankAccount;
use Illuminate\Http\Request;

class MainBankController extends Controller
{
    public function index(){
        return view('accounts.index', [
            'mainAccount' => MainBankAccount::first(),
        ]);
    }

    public function addBalance(Request $request){
        MainBankAccount::mainBankUpdateOrCreate($request);
        return redirect()->back()->with('success', 'Balance Inserted Successfully');
    }











}
