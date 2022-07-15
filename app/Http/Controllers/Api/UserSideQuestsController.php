<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SideQuest;
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
            $usersidequests = $user->userUsersidequest;
            return response()->json(['data' => $usersidequests], 200);
        }
   }

   public function store(Request $request){

        $user = Auth::user();

        $sidequest = SideQuest::find($request->sidequest_id);
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

        if ($request->won == 1) {
           
            if($user->timeleft < 12){
                $user->timeleft += 1;
                $user->update();
            }


            if ($user->udid != null) {
                 OneSignal::sendNotificationToUser(
                "Congratulations! You won 1 hour",
                $userId,
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
            );

            }
        }
        return response()->json(['data' => $user], 200); 
    }

    public function delete(Request $request){

        $user = Auth::user();

        if (!$user) {
            return response()->json(['not found'], 404);
        }
        else
        {
            $user->timeleft = 12;
            $user->userUsersidequest->delete();
            $user->update();
            return response()->json(['UserSidequests were deleted'], 200);
        }
    }
}

