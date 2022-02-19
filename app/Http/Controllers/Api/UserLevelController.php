<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Http\Request;

class UserLevelController extends Controller
{
    public function index(Request $request){
        $user = User::find($request->user_id);
        if (!$user) {
            return response()->json(['not found'], 404);
        }
        else
        {
            $userLevels = $user->userUserLevels;
            return response()->json(['data' => $userLevels], 200);
        }
   }

   public function store(Request $request){

        $user = User::find($request->user_id);
        $level = Level::find($request->level_id);
        if (!$user || !$level) {
            return response()->json(['not found'], 404);
        }
        else
        {
            if (UserLevel::where('user_id', $user->id)->where('level_id', $level->id)->exists()) {
                return response()->json(['data' => $user->userUserLevels], 200);
            }
            else
            {
                $userLevel = new UserLevel;
                $userLevel->user_id = $user->id;
                $userLevel->level_id = $level->id;
                $userLevel->save();
            }

            if ($user->udid != null) {
                 OneSignal::sendNotificationToUser(
                "New User Level registered",
                $userId,
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
            );
        }

        return response()->json(['data' => $user->userUserLevels], 200);
        }
    }
}
