<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BLandMark;
use App\Models\PushNotification;
use App\Models\UserLandmark;
use App\Models\User;
use Auth;
use OneSignal;

class BLandMarkController extends Controller
{

    public function index(){

        $landmarks = BLandMark::orderByDesc("name")->get();
        return response()->json(['data' => $landmarks], 200);
    }

    public function user_index(Request $request){

     $user = Auth::user();
        if (!$user) {
            return response()->json(['not found'], 404);
        }
        else
        {
        $userLandMarks = $user->userUserLandmarks;
        return response()->json(['data' => $userLandMarks], 200);
        }

    }

   public function store(Request $request){
        $user = Auth::user();
        if (!$user) {
            return response()->json(['not found'], 404);
        }
        else
        {
            $landmark = new UserLandmark;
            $landmark->user_id = $user->id;
            $landmark->landmark_id = $request->id;
            $landmark->save();

            $messageLoc = PushNotification::where('key', 'UserLandmark')->first();
            $langKey = $user->language;
            $content = $langKey.'_content';

            if ($user->udid != null && $messageLoc) {

                OneSignal::sendNotificationToUser(
                    $messageLoc->$content,
                    $user->udid,
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
