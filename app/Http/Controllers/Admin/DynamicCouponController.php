<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDynamicCouponRequest;
use App\Http\Requests\StoreDynamicCouponRequest;
use App\Http\Requests\UpdateDynamicCouponRequest;
use App\Models\DynamicCoupon;
use App\Models\Product;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DynamicCouponController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dynamic_coupon_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dynamicCoupons = DynamicCoupon::with(['user', 'products'])->get();

        return view('admin.dynamicCoupons.index', compact('dynamicCoupons'));
    }

    public function create()
    {
        abort_if(Gate::denies('dynamic_coupon_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id');

        return view('admin.dynamicCoupons.create', compact('products', 'users'));
    }

    public function store(StoreDynamicCouponRequest $request)
    {
        $dynamicCoupon = DynamicCoupon::create($request->all());
        $dynamicCoupon->products()->sync($request->input('products', []));

        return redirect()->route('admin.dynamic-coupons.index');
    }

    public function edit(DynamicCoupon $dynamicCoupon)
    {
        abort_if(Gate::denies('dynamic_coupon_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id');

        $dynamicCoupon->load('user', 'products');

        return view('admin.dynamicCoupons.edit', compact('dynamicCoupon', 'products', 'users'));
    }

    public function update(UpdateDynamicCouponRequest $request, DynamicCoupon $dynamicCoupon)
    {
        $dynamicCoupon->update($request->all());
        $dynamicCoupon->products()->sync($request->input('products', []));

        return redirect()->route('admin.dynamic-coupons.index');
    }

    public function show(DynamicCoupon $dynamicCoupon)
    {
        abort_if(Gate::denies('dynamic_coupon_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dynamicCoupon->load('user', 'products');

        return view('admin.dynamicCoupons.show', compact('dynamicCoupon'));
    }

    public function destroy(DynamicCoupon $dynamicCoupon)
    {
        abort_if(Gate::denies('dynamic_coupon_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dynamicCoupon->delete();

        return back();
    }

    public function massDestroy(MassDestroyDynamicCouponRequest $request)
    {
        DynamicCoupon::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
