<?php

namespace App\Http\Requests;

use App\Models\Character;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCharacterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('character_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:characters',
            ],
        ];
    }
}
