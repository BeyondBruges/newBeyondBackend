<?php

namespace App\Http\Requests;

use App\Models\DynamicCoupon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDynamicCouponRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dynamic_coupon_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'product_id' => [
                'required',
                'integer',
            ],
            'expiration' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
