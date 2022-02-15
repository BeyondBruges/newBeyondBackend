<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use OneSignal;

class TransactionController extends Controller
{
   public function index(Request $request){

    $user = User::find($request->user_id);
    if (!$user) {
        return response()->json(['not found'], 404);
    }
    else
    {
    $transactions = $user->userTransactions;
    return response()->json(['data' => $transactions], 200);
    }

   }

   public function store(Request $request){
        $user = User::find($request->user_id);
        if (!$user) {
            return response()->json(['not found'], 404);
        }
        else
        {
            $transaction = new Transaction;
            $transaction->value = $request->value;
            $transaction->status = 1;
            $transaction->user_id = $user->id;
            $transaction->transaction_type = $request->transaction_type;
            $transaction->save();

            if ($transaction->type == 1) {
               $user->bryghia += $transaction->value;
               $user->update();
            }

            if ($user->udid != null) {
                 OneSignal::sendNotificationToUser(
                "New transaction registered",
                $userId,
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
            );
        }
        return response()->json(['data' => $transaction], 200);
        }
   }
}
