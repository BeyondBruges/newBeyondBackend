<?php

namespace App\Http\Requests;

use App\Models\UserDynamicCoupon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserDynamicCouponRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_dynamic_coupon_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'dynamic_coupon_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
