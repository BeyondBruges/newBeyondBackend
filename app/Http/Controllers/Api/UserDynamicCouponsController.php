<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserDynamicCoupon;

class UserDynamicCouponsController extends Controller
{
    public function index(Request $request){

    $user = User::find($request->user_id);
    if (!$user) {
        return response()->json(['not found'], 404);
    }
    else
    {

    $dynamic_coupons = $user->userUserDynamicCoupons;
    return response()->json(['data' => $dynamic_coupons], 200);
    }

   }

    public function store(Request $request){

    $user = User::find($request->user_id);
    if (!$user) {
        return response()->json(['not found'], 404);
    }
    else
    {
    $dynamicCoupon = new UserDynamicCoupon;
    $dynamicCoupon->dynamic_coupon_id = $request->dynamic_coupon_id;
    $dynamicCoupon->user_id = $user->id;
    $dynamicCoupon->save();
    return response()->json(['data' => $dynamicCoupon], 200);
    }

   }

}
