<?php

namespace App\Http\Requests;

use App\Models\SellingPoint;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSellingPointRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('selling_point_edit');
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
