<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponsController extends Controller
{
       public function index()
    {
        $coupons=Coupon::all();
        return response()->json(['data'=>$coupons], 200);
    }
}
