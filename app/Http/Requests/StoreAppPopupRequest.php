<?php

namespace App\Http\Requests;

use App\Models\AppPopup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAppPopupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('app_popup_create');
    }

    public function rules()
    {
        return [
            'language_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
