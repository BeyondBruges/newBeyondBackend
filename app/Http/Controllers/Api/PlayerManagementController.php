<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class PlayerManagementController extends Controller
{
   public function ChangePassword(Request $request){

        $user = Auth::user();
        if (!$user) {
           return response()->json(['not found'], 404);
        }
        else
        {
            $user->password = bcrypt($request->password);
            $user->update();
            return response()->json(['Password updated successfully'], 200);
        }

   }

   public function DeleteAccount(Request $request){

        $user = Auth::user();
        if (!$user) {
           return response()->json(['not found'], 404);
        }
        else
        {
            if ($user->bryghia > 0) {
              //Create Donation
            $donation = new Donation;
            $donation->user_id = $user->id;
            $donation->value = $user->bryghia;
            $donation->save();
            //Update bryghia from User
            $user->bryghia =0;
            //Register Transaction
            $transaction = new Transaction;
            $transaction->value = $request->value;
            $transaction->status = 1;
            $transaction->user_id = $user->id;
            $transaction->transaction_type = 5;
            $transaction->save();
            // Send notification

            }
            $user->status = 0;
            $user->update();

            if ($user->udid != null) {

             $userId = $user->udid;   
                 OneSignal::sendNotificationToUser(
                "Your account has been deactivated, thank you for using Beyond Bruges",
                $userId,
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
                );
             }

            return response()->json(['Account deactivated'], 200);
        }
   }

}
