<?php

namespace App\Http\Requests;

use App\Models\AnalyticType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAnalyticTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('analytic_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:analytic_types,id',
        ];
    }
}
