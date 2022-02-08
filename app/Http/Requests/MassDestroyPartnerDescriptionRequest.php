<?php

namespace App\Http\Requests;

use App\Models\PartnerDescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPartnerDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('partner_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:partner_descriptions,id',
        ];
    }
}
