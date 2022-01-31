<?php

namespace App\Http\Requests;

use App\Models\Coupon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCouponRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('coupon_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'value' => [
                'numeric',
            ],
            'coupontype' => [
                'required',
            ],
            'partner_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
