<?php

namespace App\Http\Requests;

use App\Models\AnalyticType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAnalyticTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('analytic_type_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:analytic_types',
            ],
        ];
    }
}
