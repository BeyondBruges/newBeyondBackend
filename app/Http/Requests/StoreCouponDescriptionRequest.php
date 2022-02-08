<?php

namespace App\Http\Requests;

use App\Models\CouponDescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCouponDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('coupon_description_create');
    }

    public function rules()
    {
        return [
            'coupon_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
