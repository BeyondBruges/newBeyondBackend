<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class TimeController extends Controller
{
    public function timeOperation(Request $request){

        $time = 1;
        $user = Auth::user();

        if (!$user) {
           return response()->json(['error' => 'User Not Found'], 404);
        }
        else
        {
            if ($request->operation == "+") {
                $user->timeleft += $time;
            }
            else
            {
                $user->timeleft -= $time;
            }
            $user->update();
            return response()->json(['data' => $user], 200);
        }
    }
}
