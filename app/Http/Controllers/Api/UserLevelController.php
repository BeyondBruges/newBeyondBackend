<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Http\Request;
use QrCode;
use Auth;
use OneSignal;

class UserLevelController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
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

        $user = Auth::user();

        if ($user->bryghia < 0) {
            return response()->json(['User cannot do transactions with less than 0 bryghia'], 500);
        }


        $level = Level::find($request->level_id);
        if (!$user || !$level) {
            return response()->json(['not found'], 404);
        }
        else
        {

             if (UserLevel::where('user_id', $user->id)->where('level_id', $level->id)->exists()) {
                return response()->json(['User level already exists'], 409);
            }
            else
            {

            $currentlevel = UserLevel::where('user_id', $user->id)->where('level_id', $level->id)->first();
            if (!$currentlevel) {
              $userLevel = new UserLevel;
                $userLevel->user_id = $user->id;
                $userLevel->level_id = $level->id;
                $userLevel->save();

            }

        
        }

        return response()->json(['data' => $user->userUserLevels], 200);
        }
    }
}
