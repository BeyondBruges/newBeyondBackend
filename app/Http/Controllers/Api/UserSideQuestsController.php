<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sidequest;
use App\Models\UserSideQuest;
use Auth;

class UserSideQuestsController extends Controller
{
    public function index(Request $request){

        $user = Auth::user();
        if (!$user) {
            return response()->json(['not found'], 404);
        }
        else
        {
            $usersidequests = $user->userusersidequests;
            return response()->json(['data' => $usersidequests], 200);
        }
   }

   public function store(Request $request){

        $user = Auth::user();

        $sidequest = Siedequest::find($request->sidequest_id);
        if (!$user || !$sidequest) {
            return response()->json(['not found'], 404);
        }
        else
        {
                $usersidequest = new UserSideQuest;
                $usersidequest->user_id = $user->id;
                $usersidequest->side_quest_id = $request->side_quest_id;
                $usersidequest->save();
        }
        $user->timelefet += $request->time;

        return response()->json(['data' => $user], 200);
        }
    }
}
