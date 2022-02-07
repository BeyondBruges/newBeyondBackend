<?php

namespace App\Http\Requests;

use App\Models\UserLevel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserLevelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_level_create');
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
