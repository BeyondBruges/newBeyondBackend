<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BLandMark;
use App\Models\UserLandmark;

class BLandMarkController extends Controller
{
    public function index(){

     $user = User::find($request->user_id);
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
        $user = User::find($request->user_id);
        if (!$user) {
            return response()->json(['not found'], 404);
        }
        else
        {
            $landmark = new UserLandmark;
            $landmark->user_id = $user->id;
            $landmark->landmark_id = $request->id;
            $transaction->save();


        if ($user->udid != null) {
             OneSignal::sendNotificationToUser(
            "New landmark unlocked",
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
