<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\User;
use App\Models\UserCoupon;
use Illuminate\Http\Request;
use Auth;

class UserCouponsController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        if (!$user) {
            return response()->json(['not found'], 404);
        }
        else
        {
            $userCoupons = $user->userUserCoupons;
            return response()->json(['data' => $userCoupons], 200);
        }
   }

   public function store(Request $request){

        $user = Auth::user();
        $userId = $user->udid;
        $coupon = Coupon::find($request->coupon_id);
        if (!$user || !$coupon) {
            return response()->json(['not found'], 404);
        }
        else
        {
            if (UserCoupon::where('user_id', $user->id)->where('coupon_id', $coupon->id)->exists()) {
                return response()->json(['User Coupon already exists'], 409);
            }
            else
            {
                $userCoupon = new UserCoupon;
                $userCoupon->user_id = $user->id;
                $userCoupon->coupon_id = $coupon->id;
                $userCoupon->save();
            }

            if ($user->udid != null) {
                 OneSignal::sendNotificationToUser(
                "New Coupon Awarded!",
                $userId,
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
            );
        }

        return response()->json(['data' => $user->userUserCoupons], 200);
        }
    }
}
