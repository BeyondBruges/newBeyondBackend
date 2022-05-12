<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\QrCode;
use App\Models\User;
use App\Models\UserQrCode;
use Illuminate\Http\Request;
use Auth;

class UserQRController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
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
