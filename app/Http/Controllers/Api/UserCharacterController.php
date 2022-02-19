<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Character;
use App\Models\UserCharacter;
use OneSignal;

class UserCharacterController extends Controller
{
public function index(Request $request){
        $user = User::find($request->user_id);
        if (!$user) {
            return response()->json(['not found'], 404);
        }
        else
        {
            $userCharacters = $user->userCharacters;
            return response()->json(['data' => $userCharacters], 200);
        }
   }

   public function store(Request $request){

        $user = User::find($request->user_id);
        if (!$user) {
            return response()->json(['not found'], 404);
        }
        else
        {
            $char = App\Models\UserCharacter::where('character_id', $request->character_id)->where('user_id', $user->id)->first();
            if (!$char) {
            $character = new UserCharacter;
            $character->user_id = $user->id;
            $character->character_id = $request->character_id;
            $character->save();

            if ($user->udid != null) {
                 OneSignal::sendNotificationToUser(
                "New User Coupon registered",
                $userId,
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
            );
  
                }
            }
        return response()->json(['data' => $user->userCharacters], 200);
        
        }
    }
}
