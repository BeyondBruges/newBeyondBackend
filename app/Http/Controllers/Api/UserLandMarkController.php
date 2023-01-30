<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BLandMark;
use App\Models\PushNotification;
use App\Models\User;
use App\Models\UserLandmark;
use Illuminate\Http\Request;
use Auth;
use OneSignal;

class UserLandMarkController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        if (!$user) {
            return response()->json(['not found'], 404);
        }
        else
        {
            $userLandmarks = $user->userUserLandmarks;
            return response()->json(['data' => $userLandmarks], 200);
        }
   }

   public function store(Request $request){

        $user = Auth::user();


        if ($user->bryghia < 0) {
            return response()->json(['User cannot do transactions with less than 0 bryghia'], 500);
        }


        $userId = $user->udid;
        $landmark = BLandMark::find($request->landmark_id);
        if (!$user || !$landmark) {
            return response()->json(['not found'], 404);
        }
        else
        {
            if (UserLandmark::where('user_id', $user->id)->where('landmark_id', $landmark->id)->exists()) {
                return response()->json(['User landmark already exists'], 409);
            }
            else
            {
                $userLandmark = new UserLandmark;
                $userLandmark->user_id = $user->id;
                $userLandmark->landmark_id = $landmark->id;
                $userLandmark->save();
            }

            $messageLoc = PushNotification::where('key', 'UserLandmark')->first();
            $langKey = $user->language;

            if ($user->udid != null && $messageLoc) {
                OneSignal::sendNotificationToUser(
                    $messageLoc->$langKey.'_content',
                    $userId,
                    $url = null,
                    $data = null,
                    $buttons = null,
                    $schedule = null
                );
        }

        return response()->json(['data' => $user->userUserLandmarks], 200);
        }
    }
}
