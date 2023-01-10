<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        return view('home.index');
    }

    public function calculateSalary(){
        return view('salary.calculate-salary');
    }

    














}
