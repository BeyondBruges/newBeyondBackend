<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserDynamicCoupon;
use App\Models\DynamicCoupon;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\PushNotification;
use Illuminate\Support\Str;
use OneSignal;
use QrCode;
use Auth;

class UserDynamicCouponsController extends Controller
{
    public function index(Request $request){

    $user = Auth::user();
    if (!$user) {
        return response()->json(['not found'], 404);
    }
    else
    {

    $dynamic_coupons = $user->ActiveDynamicCoupons;
    return response()->json(['data' => $dynamic_coupons], 200);
    }

   }

    public function store(Request $request){


    $user = Auth::user();
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
        $dynamicCoupon->imageurl = config('app.url').'/dynamiccoupons/'.$dynamicCoupon->code.'.png';
        $dynamicCoupon->save();
        $dynamicCoupon->products()->sync($request->product_id);

        //Generar user dynamic coupon
        $userdynamiccoupon = new UserDynamicCoupon;
        $userdynamiccoupon->user_id = $user->id;
        $userdynamiccoupon->dynamic_coupon_id = $dynamicCoupon->id;
        $userdynamiccoupon->save();

        $messageLoc = PushNotification::where('key', 'DynamicCoupon')->first();
        $langKey = $user->language;

        if ($user->udid != null && $messageLoc) {
            $userId = $user->udid;
            OneSignal::sendNotificationToUser(
                $messageLoc->$langKey.'_content',
                $userId,
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
            );
        }
    $user->bryghia -= Product::find($request->product_id)->cost;

     QrCode::size(1024)
                ->format('png')
                ->generate(config('app.url').'/admin/redeemed-dynamic-coupons/create/'.$dynamicCoupon->code, public_path('dynamiccoupons/'.$dynamicCoupon->code.'.png'));
        $dynamicCoupon->update();

        return response()->json(['data' => $user->ActiveDynamicCoupons], 200);


    }

   }

}
