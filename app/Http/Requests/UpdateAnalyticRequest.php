<?php

namespace App\Http\Requests;

use App\Models\Analytic;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAnalyticRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('analytic_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:analytics,name,' . request()->route('analytic')->id,
            ],
            'value' => [
                'string',
                'nullable',
            ],
            'type_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
