<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RedeemedDynamicCoupon;
use App\Models\User;
use App\Models\DynamicCoupon;
use App\Models\Partner;
use Auth;

class RedeemedDynamicCouponsController extends Controller
{

    public function index(){

        $coupons = RedeemedDynamicCoupon::all();
        $partners = Partner::all();
        return view('admin.redeemedDynamicCoupons.index', compact('coupons', 'partners'));
    }

    public function create($id){

        $dynamicCoupon = DynamicCoupon::where('code', $id)->first();
        $loggedUser = Auth::user();

        if (!$dynamicCoupon) {
         return view('admin.redeemedDynamicCoupons.index')->with('danger', 'Dynamic coupon does not exists');
        }
        else
        {
        return view('admin.redeemedDynamicCoupons.create',  compact('dynamicCoupon', 'loggedUser'));
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
            return view('admin.redeemedDynamicCoupons.index');

        }


    }
}
