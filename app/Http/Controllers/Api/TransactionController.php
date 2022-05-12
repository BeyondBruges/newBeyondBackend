<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use OneSignal;
use App\Models\Donation;
use Auth;

class TransactionController extends Controller
{
   public function index(Request $request){

    $user = Auth::user();
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
        $userId = "";
        $user = Auth::user();
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

            if ($transaction->transaction_type == 1) {
               $user->bryghia += $transaction->value;
               $user->update();
               
                if ($user->udid != null) {
                    $userId = $user->udid; 
                     OneSignal::sendNotificationToUser(
                    "Purchase succeded! ".$request->value." bryghia have been added",
                    $userId,
                    $url = null,
                    $data = null,
                    $buttons = null,
                    $schedule = null
                );

            }
            
            
        }


                if ($transaction->transaction_type == 2 || $transaction->transaction_type == 3) {
               $user->bryghia -= $transaction->value;
               $user->update();
 
                
                if ($user->udid != null) {
                    $userId = $user->udid; 
                     OneSignal::sendNotificationToUser(
                    "Your purchase has been successfully processed",
                    $userId,
                    $url = null,
                    $data = null,
                    $buttons = null,
                    $schedule = null
                );
                

            }
            
        }


        return response()->json(['data' => $user->bryghia], 200);
        }
    }

    public function donate(Request $request)

    {
        $userId = "";
        $user = Auth::user();

        if ($request->value < 0) {
           return response()->json(['Donation cannot be negative'], 500);
        }

        if ($user->bryghia < $request->value) {
           return response()->json(['User does not have enough funds'], 500);
        }

            
        
        if (!$user) {
            return response()->json(['user not found'], 404);
        }
        else
        {
            //Create Donation
            $donation = new Donation;
            $donation->user_id = $user->id;
            $donation->value = $request->value;
            $donation->save();
            //Update bryghia from User
            $user->bryghia =0;
            $user->update();
            //Register Transaction
            $transaction = new Transaction;
            $transaction->value = $request->value;
            $transaction->status = 1;
            $transaction->user_id = $user->id;
            $transaction->transaction_type = 5;
            $transaction->save();
            // Send notification

            if ($user->udid != null) {

             $userId = $user->udid;   
                 OneSignal::sendNotificationToUser(
                "Your bryghia donation has been processed. Thank you for your generosity!",
                $userId,
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
                );
             }

             return response()->json(['data' => $user->bryghia], 200);
        }

    }

    public function gift(Request $request)
    
    {
        $userId = "";
        $user = Auth::user();
        $user_b = User::where('email', $request->user_b)->first();


         $userId = "";
        $user = Auth::user();

        if ($request->value < 0) {
           return response()->json(['Donation cannot be negative'], 500);
        }

        if ($user->bryghia < $request->value) {
           return response()->json(['User does not have enough funds'], 500);
        }

        if (!$user || !$user_b) 
        {
            return response()->json(['user not found'], 404);
        }
        else
        {
            //Create Donation
            $donation = new Donation;
            $donation->user_id = $user->id;
            $donation->value = $request->value;
            $donation->save();
            //Update bryghia from User
            $user->bryghia =0;
            $user_b->bryghia += $request->value;
            $user_b->update();
            $user->update();
            //Register Transaction
            $transaction = new Transaction;
            $transaction->value = $request->value;
            $transaction->status = 1;
            $transaction->user_id = $user->id;
            $transaction->transaction_type = 5;
            $transaction->save();
            // Send notification

            if ($user->udid != null) {

             $userId = $user->udid;   
                 OneSignal::sendNotificationToUser(
                "Your bryghia donation has been processed. Thank you for your generosity!",
                $userId,
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
                );
             }

            if ($user_b->udid != null) {

             $userId = $user_b->udid;   
                 OneSignal::sendNotificationToUser(
                $user->name." has given you ".$request->value." Bryghia! You can use them to unlock content in the app!",
                $userId,
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
                );
             }

             return response()->json(['data' => $user->bryghia], 200);
        }

    }
}

