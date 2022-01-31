<?php

namespace App\Http\Requests;

use App\Models\LevelObject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLevelObjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('level_object_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:level_objects,id',
        ];
    }
}
