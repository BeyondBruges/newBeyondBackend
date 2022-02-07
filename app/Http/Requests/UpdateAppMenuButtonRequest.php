<?php

namespace App\Http\Requests;

use App\Models\AppMenuButton;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAppMenuButtonRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('app_menu_button_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'key' => [
                'string',
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
