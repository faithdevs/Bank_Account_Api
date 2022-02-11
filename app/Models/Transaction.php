<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
        'accountNo', 'customer', 'dc', 'amount',
    ];
}
