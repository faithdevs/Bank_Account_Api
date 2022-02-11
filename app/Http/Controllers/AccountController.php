<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\User;

class AccountController extends Controller
{
    public function withdrawal(Request $request){

    
    }

    
    public function create(Request $request){
        try{
            $newAccount = new Account();
            $newAccount->account_no=$request->account_no;
            $newAccount->account_name=$request->account_name;
            $newAccount->account_signatory=$request->account_signatory;
            $newAccount->balance=$request->balance;
            
            $newAccount->save();

            $data = $newAccount;
            $message = "Account creation Successful";
            return response()->json(compact('data', 'message'), 200);
        }catch(Exception $ex){
            $data = $request;
            $message = "There was an error";
            return response()->json(compact('data', 'message'), 500);
        }     
        
    }

    public function getAccount(string $account_no){
        $theAccount = Account::where("account_no", $account_no)->first();
        if(!is_null($theAccount)){
            $data = $theAccount;
            $message = "Successful";
            return response()->json(compact('data', 'message'), 200);
        } else{
            $data = $request;
            $message = "There was an error";
            return response()->json(compact('data', 'message'), 500);
        }
        
    }
}
