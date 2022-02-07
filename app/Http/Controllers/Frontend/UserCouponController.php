<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserCouponRequest;
use App\Http\Requests\StoreUserCouponRequest;
use App\Http\Requests\UpdateUserCouponRequest;
use App\Models\Coupon;
use App\Models\User;
use App\Models\UserCoupon;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserCouponController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_coupon_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userCoupons = UserCoupon::with(['user', 'coupon'])->get();

        return view('frontend.userCoupons.index', compact('userCoupons'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_coupon_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $coupons = Coupon::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.userCoupons.create', compact('coupons', 'users'));
    }

    public function store(StoreUserCouponRequest $request)
    {
        $userCoupon = UserCoupon::create($request->all());

        return redirect()->route('frontend.user-coupons.index');
    }

    public function edit(UserCoupon $userCoupon)
    {
        abort_if(Gate::denies('user_coupon_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $coupons = Coupon::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userCoupon->load('user', 'coupon');

        return view('frontend.userCoupons.edit', compact('coupons', 'userCoupon', 'users'));
    }

    public function update(UpdateUserCouponRequest $request, UserCoupon $userCoupon)
    {
        $userCoupon->update($request->all());

        return redirect()->route('frontend.user-coupons.index');
    }

    public function show(UserCoupon $userCoupon)
    {
        abort_if(Gate::denies('user_coupon_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userCoupon->load('user', 'coupon');

        return view('frontend.userCoupons.show', compact('userCoupon'));
    }

    public function destroy(UserCoupon $userCoupon)
    {
        abort_if(Gate::denies('user_coupon_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userCoupon->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserCouponRequest $request)
    {
        UserCoupon::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
