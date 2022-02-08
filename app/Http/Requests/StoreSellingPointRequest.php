<?php

namespace App\Http\Requests;

use App\Models\SellingPoint;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSellingPointRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('selling_point_create');
    }

    public function rules()
    {
        return [
            'icon_code' => [
                'string',
                'nullable',
            ],
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
