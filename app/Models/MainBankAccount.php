<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainBankAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'current_balance',
    ];
}
