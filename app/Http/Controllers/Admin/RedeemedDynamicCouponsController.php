<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RedeemedDynamicCoupon;
use App\Models\User;
use App\Models\DynamicCoupon;
use App\Models\Partner;

class RedeemedDynamicCouponsController extends Controller
{

    public function index(){

        $coupons = RedeemedDynamicCoupon::all();
        $partners = Partner::all();
        return view('admin.redeemedDynamicCoupons.index', compact('coupons', 'partners'));
    }

    public function create($id){

        $dynamicCoupon = DynamicCoupon::where('code', $id)->first();

        if (!$dynamicCoupon) {
         return view('admin.redeemedDynamicCoupons.index');
        }
        else
        {
        return view('admin.redeemedDynamicCoupons.create',  compact('dynamicCoupon'));
        }

     }

    public function store(Request $request){



        $dynamicCoupon = DynamicCoupon::find($request->dynamic_coupon_id);
        if (!$dynamicCoupon) {
            
            return view('admin.redeemedDynamicCoupons.index');
        }
        else
        {
            $redeemed = new RedeemedDynamicCoupon;
            $redeemed->user_id = $request->user_id;
            $redeemed->partner_id = $request->partner_id;
            $redeemed->dynamic_coupon_id = $dynamicCoupon->id;
            $redeemed->save();
            $dynamicCoupon->status = 0;
            $dynamicCoupon->update();
            return redirect()->back();

        }
        

    }
}
