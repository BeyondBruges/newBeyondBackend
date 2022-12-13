<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class TimeController extends Controller
{
    public function addTime(Request $request){

        $user = Auth::user();

        if (!$user) {
           return response()->json(['error' => 'User Not Found'], 404);
        }
        else
        {
            if ($user->timeleft < 12) {
                $user->timeleft += $request->time;
            }

            $user->update();
            return response()->json(['data' => $user], 200);
        }
    }

    public function setTime(Request $request){
        $user = Auth::user();

        if (!$user) {
           return response()->json(['error' => 'User Not Found'], 404);
        }
        else
        {
            $user->timeleft = $request->time;
            $user->update();
            return response()->json(['data' => $user], 200);
        }
    }
}
