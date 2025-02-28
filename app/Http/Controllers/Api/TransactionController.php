<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\TransactionType;
use OneSignal;
use App\Models\Donation;
use App\Models\PushNotification;
use Auth;
use Illuminate\Support\Facades\Log;

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

                $messageLoc = PushNotification::where('key', 'BryghiaPurchased')->first();
                $searchVal = array("{value}");
                $replaceVal = array($request->value);
                $langKey = $user->language;
                $content = $langKey.'_content';

                Log::debug(str_replace($searchVal, $replaceVal, $messageLoc->$content));
                if ($user->udid != null && $messageLoc) {
                    $userId = $user->udid;
                    OneSignal::sendNotificationToUser(
                        str_replace($searchVal, $replaceVal, $messageLoc->$content),
                        $userId,
                        $url = null,
                        $data = null,
                        $buttons = null,
                        $schedule = null
                    );
                }
            }
            else
            {
                $user->bryghia -= $transaction->value;
                $user->update();

                $messageLoc = PushNotification::where('key', 'Purchase')->first();
                $langKey = $user->language;
                $content = $langKey.'_content';

                if ($user->udid != null && $messageLoc) {
                    $userId = $user->udid;
                    OneSignal::sendNotificationToUser(
                        $messageLoc->$content,
                        $userId,
                        $url = null,
                        $data = null,
                        $buttons = null,
                        $schedule = null
                    );
                }
            }
            $user->update();
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

            $type = TransactionType::where('name', 'Foundation Donation')->first();
            if (!$type) {
              return response()->json(['Donation type does not exists'], 500);
            }

            //Create Donation
            $donation = new Donation;
            $donation->user_id = $user->id;
            $donation->value = $request->value;
            $donation->save();
            //Update bryghia from User
            $user->bryghia -= $request->value;
            $user->update();
            //Register Transaction
            $transaction = new Transaction;
            $transaction->value = $request->value;
            $transaction->status = 1;
            $transaction->user_id = $user->id;
            $transaction->transaction_type = $type->id;
            $transaction->save();
            // Send notification

            if ($user->udid != null) {

                $userId = $user->udid;

                $messageLoc = PushNotification::where('key', 'BryghiaDonation')->first();
                $langKey = $user->language;
                $content = $langKey.'_content';

                if($messageLoc){
                    OneSignal::sendNotificationToUser(
                        $messageLoc->$content,
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

    public function gift(Request $request)

    {
        $userId = "";
        $user = Auth::user();
        $user_b = User::where('email', $request->user_b)->first();


         $userId = "";
        $user = Auth::user();

        $type = TransactionType::where('name', 'User Donation')->first();
            if (!$type) {
              return response()->json(['Donation type does not exists'], 500);
            }

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
            $user->bryghia -= $request->value;
            $user_b->bryghia += $request->value;
            $user_b->update();
            $user->update();
            //Register Transaction
            $transaction = new Transaction;
            $transaction->value = $request->value;
            $transaction->status = 1;
            $transaction->user_id = $user->id;
            $transaction->transaction_type = $type->id;
            $transaction->save();
            // Send notification

            if ($user->udid != null) {

                $userId = $user->udid;

                $messageLoc = PushNotification::where('key', 'BryghiaDonation')->first();
                $langKey = $user->language;
                $content = $langKey.'_content';

                if($messageLoc){
                    OneSignal::sendNotificationToUser(
                        $messageLoc->$content,
                        $userId,
                        $url = null,
                        $data = null,
                        $buttons = null,
                        $schedule = null
                    );
                }
            }

            if ($user_b->udid != null) {

                $userId = $user_b->udid;

                $messageLoc = PushNotification::where('key', 'BryghiaToUser')->first();
                $searchVal = array("{userName}", "{value}");
                $replaceVal = array($user->name, $request->value);
                $langKey = $user_b->language;
                $content = $langKey.'_content';

                if($messageLoc){
                    OneSignal::sendNotificationToUser(
                        str_replace($searchVal, $replaceVal, $messageLoc->$content),
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
}

