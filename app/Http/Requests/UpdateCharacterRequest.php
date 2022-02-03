<?php

namespace App\Http\Requests;

use App\Models\Character;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCharacterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('character_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:characters,name,' . request()->route('character')->id,
            ],
        ];
    }
}
