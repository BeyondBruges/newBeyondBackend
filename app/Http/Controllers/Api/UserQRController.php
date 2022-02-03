<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\QrCode;
use App\Models\User;
use App\Models\UserQrCode;
use Illuminate\Http\Request;

class UserQRController extends Controller
{
    public function index(Request $request){
        $user = User::find($request->user_id);
        if (!$user) {
            return response()->json(['not found'], 404);
        }
        else
        {
            $userQRs = $user->userUserQrCodes;
            return response()->json(['data' => $userQRs], 200);
        }
   }
}
