<?php

namespace App\Http\Requests;

use App\Models\CouponDescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCouponDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('coupon_description_edit');
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
