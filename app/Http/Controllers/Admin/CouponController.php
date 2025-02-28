<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCouponRequest;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use App\Models\PermanentCode;
use App\Models\Partner;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use App\Models\BoxCode;

class CouponController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('coupon_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $coupons = BoxCode::orderBy('id', 'desc')->paginate(1000);
        $permanentCoupons = PermanentCode::orderBy('id', 'desc')->paginate(1000);
        return view('admin.coupons.index', compact('coupons', 'permanentCoupons'));
    }

    public function storepermantent(Request $request){

        $coupon = PermanentCode::create($request->all());
        $coupon->status = 1;
        $coupon->update();
        return redirect()->route('admin.coupons.index');
    }


    public function editpermantent($id){

        $coupon = PermanentCode::find($id);
        $coupon->status = $coupon->status == 1 ? 2 : 1;
        $coupon->update();
        return redirect()->route('admin.coupons.index');
    }

    public function destroypermanent(Request $request){

        $coupon = PermanentCode::find($request->id);
        $coupon->delete();
        return back();
    }

    public function create()
    {
        abort_if(Gate::denies('coupon_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = Partner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.coupons.create', compact('partners'));
    }

    public function store(StoreCouponRequest $request)
    {
        $coupon = Coupon::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $coupon->id]);
        }

        return redirect()->route('admin.coupons.index');
    }

    public function edit(Coupon $coupon)
    {
        abort_if(Gate::denies('coupon_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = Partner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $coupon->load('partner');

        return view('admin.coupons.edit', compact('coupon', 'partners'));
    }

    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        $coupon->update($request->all());

        return redirect()->route('admin.coupons.index');
    }

    public function show(Coupon $coupon)
    {
        abort_if(Gate::denies('coupon_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coupon->load('partner');

        return view('admin.coupons.show', compact('coupon'));
    }

    public function destroy(Coupon $coupon)
    {
        abort_if(Gate::denies('coupon_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coupon->delete();

        return back();
    }

    public function massDestroy(MassDestroyCouponRequest $request)
    {
        Coupon::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('coupon_create') && Gate::denies('coupon_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Coupon();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
