<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryScale extends Model
{
    use HasFactory;
    protected $fillable = [
        'basic',
        'house_rent',
        'medical_allowance',
        'total',
        'rank',
    ];

    public static function salaryScaleUpdateOrCreated($request){
        $basic = $request->low_basic_salary;

        for($i =1 ; $i<=6 ; $i++){
            $basic = $request->low_basic_salary;
            if($i == 1){
                SalaryScale::updateOrCreate(['id'=> $i], [
                    'rank' => 6,
                    'basic' => $basic,
                    'house_rent' => $houseRent = $basic * (20/100),
                    'medical_allowance' => $medical =  $basic * (15/100),
                    'total' => $basic + $houseRent + $medical,
                ]);
            }
            if($i == 2){
                SalaryScale::updateOrCreate(['id'=> $i], [
                    'rank' => 5,
                    'basic' => $basic = $basic + 5000,
                    'house_rent' => $houseRent = $basic * (20/100),
                    'medical_allowance' => $medical =  $basic * (15/100),
                    'total' => $basic + $houseRent + $medical,
                ]);
            }

            if($i == 3){
                SalaryScale::updateOrCreate(['id'=> $i], [
                    'rank' => 4,
                    'basic' => $basic = $basic + 10000,
                    'house_rent' => $houseRent = $basic * (20/100),
                    'medical_allowance' => $medical =  $basic * (15/100),
                    'total' => $basic + $houseRent + $medical,
                ]);
            }
            if($i == 4){
                SalaryScale::updateOrCreate(['id'=> $i], [
                    'rank' => 3,
                    'basic' => $basic = $basic + 15000,
                    'house_rent' => $houseRent = $basic * (20/100),
                    'medical_allowance' => $medical =  $basic * (15/100),
                    'total' => $basic + $houseRent + $medical,
                ]);
            }
            if($i == 5){
                SalaryScale::updateOrCreate(['id'=> $i], [
                    'rank' => 2,
                    'basic' => $basic = $basic + 20000,
                    'house_rent' => $houseRent = $basic * (20/100),
                    'medical_allowance' => $medical =  $basic * (15/100),
                    'total' => $basic + $houseRent + $medical,
                ]);
            }
            if($i == 6){
                SalaryScale::updateOrCreate(['id'=> $i], [
                    'rank' => 1,
                    'basic' => $basic = $basic + 25000,
                    'house_rent' => $houseRent = $basic * (20/100),
                    'medical_allowance' => $medical =  $basic * (15/100),
                    'total' => $basic + $houseRent + $medical,
                ]);
            }

            




        }
    } 






}
