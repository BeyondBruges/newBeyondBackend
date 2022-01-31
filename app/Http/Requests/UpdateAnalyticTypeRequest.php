<?php

namespace App\Http\Requests;

use App\Models\AnalyticType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAnalyticTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('analytic_type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:analytic_types,name,' . request()->route('analytic_type')->id,
            ],
        ];
    }
}
