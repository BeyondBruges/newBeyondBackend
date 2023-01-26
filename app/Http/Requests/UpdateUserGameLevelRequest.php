<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserGameLevelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_level_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'level_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
