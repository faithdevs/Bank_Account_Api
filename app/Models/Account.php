<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;


class Account extends Model
{
    protected $table = 'accounts';
    protected $fillable = [
        'account_no', 'account_name', 'account_signatory', 'balance',
    ];
}
