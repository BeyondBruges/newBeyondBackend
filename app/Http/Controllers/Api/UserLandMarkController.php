<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BLandMark;
use App\Models\User;
use App\Models\UserLandmark;
use Illuminate\Http\Request;

class UserLandMarkController extends Controller
{
    public function index(Request $request){
        $user = User::find($request->user_id);
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

        $user = User::find($request->user_id);
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

            if ($user->udid != null) {
                 OneSignal::sendNotificationToUser(
                "New User Landmark registered",
                $userId,
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
            );
        }

        return response()->json(['data' => $userLandmark], 200);
        }
    }
}