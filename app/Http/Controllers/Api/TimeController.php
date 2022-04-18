<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class TimeController extends Controller
{
    public function timeOperation(Request $request){

        $user = User::find($request->user_id);

        if (!$user) {
           return response()->json(['error' => 'User Not Found'], 404);
        }
        else
        {
            if ($request->operation == "+") {
                $user->timeleft += $request->value;
            }
            else
            {
                $user->timeleft -= $request->value;
            }
            $user->update();
            return response()->json(['data' => $user], 200);
        }
    }
}
