<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'rank',
        'address',
        'mobile',
    ];

    public static function employeeUpdateOrCreate($request, $id = null){
        Employee::updateOrCreate(['id' => $id], [
            'name' => $request->name,
            'rank' => $request->rank,
            'address' => $request->address,
            'mobile' => $request->mobile,
        ]);
    }
}
