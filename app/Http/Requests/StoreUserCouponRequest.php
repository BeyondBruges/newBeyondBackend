<?php

namespace App\Http\Requests;

use App\Models\UserCoupon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserCouponRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_coupon_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
