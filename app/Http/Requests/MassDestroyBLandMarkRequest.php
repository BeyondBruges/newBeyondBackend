<?php

namespace App\Http\Requests;

use App\Models\BLandMark;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBLandMarkRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('b_land_mark_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:b_land_marks,id',
        ];
    }
}
