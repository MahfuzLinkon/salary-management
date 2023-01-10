<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_name',
        'account_type',
        'account_number',
        'bank_name',
        'branch_name',
        'current_balance',
    ];

    public static function bankAccountUpdateOrCreate($request, $id =null){
        BankAccount::updateOrCreate(['id'=> $id], [
            'account_name' => $request->account_name,
            'account_type' => $request->account_type,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'branch_name' => $request->branch_name,
        ]);


    }








}
