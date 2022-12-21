<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\UserLevelObject;

class UserLevelObjectController extends Controller
{
    public function index(Request $request){

    $user = Auth::user();
    if (!$user) {
        return response()->json(['not found'], 404);
    }
    else
    {

    $level_objects = $user->userUserLevelObjects;
    return response()->json(['data' => $level_objects], 200);
    }

   }

    public function store(Request $request){

        $user = Auth::user();
        if (!$user) {
            return response()->json(['not found'], 404);
        }
        else
        {
        $level_object = new UserLevelObject;
        $level_object->level_object_id = $request->level_object_id;
        $level_object->user_id = $user->id;
        $level_object->save();

        /*
        $user->timeleft += 1;
        if($user->timeleft > 12){
            $user->timeleft = 12;
        }
        $user->update();
        */

        return response()->json(['data' => $user->userUserLevelObjects], 200);
        }

   }

   public function delete(Request $request){

        $user = Auth::user();

        if (!$user) {
            return response()->json(['not found'], 404);
        }
        else
        {
            $user->timeleft = 12;
            if ($user->userUserLevelObjects->count() > 0)
            {
                foreach($user->userUserLevelObjects as $object)
                {
                    $object->delete();
                }
            }
            $user->update();
            return response()->json(['UserLevelObjects were deleted'], 200);
        }
    }
}
