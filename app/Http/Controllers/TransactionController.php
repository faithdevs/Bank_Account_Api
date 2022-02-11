<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\User;

class TransactionController extends Controller
{
    //
    public function depositOrWitdraw(Request $request){
        $transactType = $request->dc;
        $account = Account::where("account_no",$request->account_no)->first();
        if(!is_null($account)){
             $transaction = new Transaction([
            'accountNo'=>$request->accountNo,
             'customer'=>$request->customer, 
             'dc'=>$transactType, 
             'amount'=>$request->amount,
            ]);
            if(!is_null($transaction)){
                if($transactType == "D"){
                    $account->balance = $account->balance + $request->amount;
                    $account->save();
                    $transaction->save();
                }else if($transactType == "W"){
                    if($account->balance >= $request->amount){
                        $account->balance = $account->balance - $request->amount;
                        $account->save();
                        $transaction->save();
                    }else{
                        $data = $request;
                        $message = "Insufficient fund";
                        return response()->json(compact('data', 'message'), 500);
                    }
                    
                }else{
                    $data = $request;
                    $message = "Invalid transaction selected";
                    return response()->json(compact('data', 'message'), 500);
                }
                
                $response=[
                    'account' => $account,
                   'transaction' => $transaction
                ];
        
                return response($response, 201);
                
            }

        }
        $data = $request;
        $message = "There was an error";
        return response()->json(compact('data', 'message'), 500);    
    
    }


    public function getTransaction(string $accountNo){
        $theTransaction = Transaction::where("accountNo", $accountNo)->first();
        if(!is_null($theTransaction)){
            $data = $theTransaction;
            $message = "Successful";
            return response()->json(compact('data', 'message'), 200);
        } else{
            $data = $request;
            $message = "There was an error";
            return response()->json(compact('data', 'message'), 500);
        }
        
    }

}