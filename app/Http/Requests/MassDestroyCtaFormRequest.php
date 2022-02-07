<?php

namespace App\Http\Requests;

use App\Models\CtaForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCtaFormRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cta_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cta_forms,id',
        ];
    }
}
