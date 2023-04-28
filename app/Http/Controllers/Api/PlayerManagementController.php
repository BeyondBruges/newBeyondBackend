<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\PushNotification;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use OneSignal;
class PlayerManagementController extends Controller
{
   public function ChangePassword(Request $request){

        $user = Auth::user();
        if (!$user) {
           return response()->json(['User not found'], 404);
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
            $user->status = 0;
            $user->update();

            $messageLoc = PushNotification::where('key', 'AccountDeactivated')->first();
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

            return response()->json(['Account deactivated'], 200);
        }
   }

}
