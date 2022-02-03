<?php

namespace App\Http\Requests;

use App\Models\UserCharacter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserCharacterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_character_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
