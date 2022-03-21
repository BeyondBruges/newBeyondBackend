<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserDynamicCoupon;
use App\Models\DynamicCoupon;
use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Support\Str;

class UserDynamicCouponsController extends Controller
{
    public function index(Request $request){

    $user = User::find($request->user_id);
    if (!$user) {
        return response()->json(['not found'], 404);
    }
    else
    {

    $dynamic_coupons = $user->DynamicCoupons;
    return response()->json(['data' => $dynamic_coupons], 200);
    }

   }

    public function store(Request $request){


    $user = User::find($request->user_id);
    if (!$user) {
        return response()->json(['user not found'], 404);
    }
    else
    {   
        //Generar  dynamic coupon
        $dynamicCoupon = new dynamicCoupon;
        $dynamicCoupon->name = Product::find($request->product_id)->name;

        if ($request->productCategory == "1") {
            $date = Carbon::now()->addDays(7);
        }
        else
        {
            $date = Carbon::now()->addHours(1);
        }
        $dynamicCoupon->expiration = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format(config('panel.date_format'). ' ' . config('panel.time_format'));   
        $dynamicCoupon->user_id = $user->id;
        $dynamicCoupon->code = Str::random(8);
        $dynamicCoupon->save();
        $dynamicCoupon->products()->sync($request->productCategory);

        //Generar user dynamic coupon
        $userdynamiccoupon = new UserDynamicCoupon;
        $userdynamiccoupon->user_id = $user->id;
        $userdynamiccoupon->dynamic_coupon_id = $dynamicCoupon->id;
        $userdynamiccoupon->save();

        return response()->json(['data' => $user->DynamicCoupons], 200);


    }

   }

}
