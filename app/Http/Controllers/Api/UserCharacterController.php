<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Character;
use App\Models\UserCharacter;
use OneSignal;
use Auth;

class UserCharacterController extends Controller
{
public function index(Request $request){
        $user = Auth::user();
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

        $user = Auth::user();
        if (!$user) {
            return response()->json(['not found'], 404);
        }
        else
        {
            $char = UserCharacter::where('character_id', $request->character_id)->where('user_id', $user->id)->first();
            if (!$char) {
            $character = new UserCharacter;
            $character->user_id = $user->id;
            $character->character_id = isset($request->character_id) ? $request->character_id : 1;
            $character->save();


            }
        return response()->json(['data' => $user->userCharacters], 200);
        
        }
    }
}
