<?php

namespace App\Http\Requests;

use App\Models\BlandmarkContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBlandmarkContentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('blandmark_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:blandmark_contents,id',
        ];
    }
}
