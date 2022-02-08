<?php

namespace App\Http\Requests;

use App\Models\UserLevelObject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserLevelObjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_level_object_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'level_object_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
