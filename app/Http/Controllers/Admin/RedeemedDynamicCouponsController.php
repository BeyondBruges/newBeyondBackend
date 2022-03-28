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
        return view('admin.redeemedDynamicCoupons.index');
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

        return $request;

    }
}
