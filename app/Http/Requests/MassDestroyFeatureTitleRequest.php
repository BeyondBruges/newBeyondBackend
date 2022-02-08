<?php

namespace App\Http\Requests;

use App\Models\FeatureTitle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFeatureTitleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('feature_title_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:feature_titles,id',
        ];
    }
}
