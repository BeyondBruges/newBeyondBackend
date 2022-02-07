<?php

namespace App\Http\Requests;

use App\Models\Dialogue;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDialogueRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dialogue_create');
    }

    public function rules()
    {
        return [
            'key' => [
                'string',
                'nullable',
            ],
        ];
    }
}
