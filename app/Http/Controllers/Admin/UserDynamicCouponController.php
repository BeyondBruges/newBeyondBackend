<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserDynamicCouponRequest;
use App\Http\Requests\StoreUserDynamicCouponRequest;
use App\Http\Requests\UpdateUserDynamicCouponRequest;
use App\Models\DynamicCoupon;
use App\Models\User;
use App\Models\UserDynamicCoupon;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserDynamicCouponController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_dynamic_coupon_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userDynamicCoupons = UserDynamicCoupon::with(['user', 'dynamic_coupon'])->get();

        return view('admin.userDynamicCoupons.index', compact('userDynamicCoupons'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_dynamic_coupon_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dynamic_coupons = DynamicCoupon::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userDynamicCoupons.create', compact('dynamic_coupons', 'users'));
    }

    public function store(StoreUserDynamicCouponRequest $request)
    {
        $userDynamicCoupon = UserDynamicCoupon::create($request->all());

        return redirect()->route('admin.user-dynamic-coupons.index');
    }

    public function edit(UserDynamicCoupon $userDynamicCoupon)
    {
        abort_if(Gate::denies('user_dynamic_coupon_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dynamic_coupons = DynamicCoupon::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userDynamicCoupon->load('user', 'dynamic_coupon');

        return view('admin.userDynamicCoupons.edit', compact('dynamic_coupons', 'userDynamicCoupon', 'users'));
    }

    public function update(UpdateUserDynamicCouponRequest $request, UserDynamicCoupon $userDynamicCoupon)
    {
        $userDynamicCoupon->update($request->all());

        return redirect()->route('admin.user-dynamic-coupons.index');
    }

    public function show(UserDynamicCoupon $userDynamicCoupon)
    {
        abort_if(Gate::denies('user_dynamic_coupon_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userDynamicCoupon->load('user', 'dynamic_coupon');

        return view('admin.userDynamicCoupons.show', compact('userDynamicCoupon'));
    }

    public function destroy(UserDynamicCoupon $userDynamicCoupon)
    {
        abort_if(Gate::denies('user_dynamic_coupon_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userDynamicCoupon->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserDynamicCouponRequest $request)
    {
        UserDynamicCoupon::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
