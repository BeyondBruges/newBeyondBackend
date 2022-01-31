<?php

namespace App\Http\Requests;

use App\Models\DynamicCoupon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDynamicCouponRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dynamic_coupon_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dynamic_coupons,id',
        ];
    }
}
