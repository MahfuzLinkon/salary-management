<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalarySheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'rank',
        'amount',
        'employee_id',
        'account_number',
    ];

    public static function transferSalaryCreate($request){
        $mainAccount = MainBankAccount::first();
        if(isset($mainAccount->balance)){
            if($mainAccount->balance >= $request->amount){
                SalarySheet::create([
                    'rank' => $request->rank,
                    'amount' => $request->amount,
                    'employee_id' => $request->employee_id,
                    'account_number' => $request->account_number,
                ]);
                $mainAccount->balance = $mainAccount->balance - $request->amount;
                $mainAccount->save();
    
                $employeeAccount = BankAccount::where('employee_id', $request->employee_id)->first();
                $employeeAccount->current_balance = $employeeAccount->current_balance + $request->amount;
                $employeeAccount->save();
    
                $message = [
                    'type' => 'success' ,
                    'message' => 'Salary paid successfully',
                ];
                return $message;
            }else{
                $message = [
                    'type' => 'error' ,
                    'message' => 'Insufficient balance in main account',
                ];
                return $message;
            }
        }else{
            $message = [
                'type' => 'error' ,
                'message' => 'Enter initial balance in main account',
            ];
            return $message;
        }

    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
