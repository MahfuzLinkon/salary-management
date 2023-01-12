<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainBankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'balance',
    ];

    public static function mainBankUpdateOrCreate($request, $id = 1){
        
        MainBankAccount::updateOrCreate(['id' => $id], [
            'balance' => isset(MainBankAccount::first()->id) ? MainBankAccount::find($id)->balance + $request->balance : $request->balance,
        ]);
    }
}
