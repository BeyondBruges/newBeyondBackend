<?php

namespace App\Http\Requests;

use App\Models\LevelObject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLevelObjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('level_object_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:level_objects,name,' . request()->route('level_object')->id,
            ],
            'level_id' => [
                'required',
                'integer',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
