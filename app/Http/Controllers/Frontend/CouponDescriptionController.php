<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCouponDescriptionRequest;
use App\Http\Requests\StoreCouponDescriptionRequest;
use App\Http\Requests\UpdateCouponDescriptionRequest;
use App\Models\Coupon;
use App\Models\CouponDescription;
use App\Models\Language;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CouponDescriptionController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('coupon_description_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $couponDescriptions = CouponDescription::with(['coupon', 'language'])->get();

        return view('frontend.couponDescriptions.index', compact('couponDescriptions'));
    }

    public function create()
    {
        abort_if(Gate::denies('coupon_description_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coupons = Coupon::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.couponDescriptions.create', compact('coupons', 'languages'));
    }

    public function store(StoreCouponDescriptionRequest $request)
    {
        $couponDescription = CouponDescription::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $couponDescription->id]);
        }

        return redirect()->route('frontend.coupon-descriptions.index');
    }

    public function edit(CouponDescription $couponDescription)
    {
        abort_if(Gate::denies('coupon_description_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coupons = Coupon::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $couponDescription->load('coupon', 'language');

        return view('frontend.couponDescriptions.edit', compact('couponDescription', 'coupons', 'languages'));
    }

    public function update(UpdateCouponDescriptionRequest $request, CouponDescription $couponDescription)
    {
        $couponDescription->update($request->all());

        return redirect()->route('frontend.coupon-descriptions.index');
    }

    public function show(CouponDescription $couponDescription)
    {
        abort_if(Gate::denies('coupon_description_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $couponDescription->load('coupon', 'language');

        return view('frontend.couponDescriptions.show', compact('couponDescription'));
    }

    public function destroy(CouponDescription $couponDescription)
    {
        abort_if(Gate::denies('coupon_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $couponDescription->delete();

        return back();
    }

    public function massDestroy(MassDestroyCouponDescriptionRequest $request)
    {
        CouponDescription::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('coupon_description_create') && Gate::denies('coupon_description_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CouponDescription();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
