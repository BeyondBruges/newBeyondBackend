<?php

namespace App\Http\Requests;

use App\Models\CtaForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCtaFormRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cta_form_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'subtitle' => [
                'string',
                'nullable',
            ],
            'inputfield_text' => [
                'string',
                'nullable',
            ],
            'button_text' => [
                'string',
                'nullable',
            ],
            'legends_title' => [
                'string',
                'nullable',
            ],
            'legends_subtitle' => [
                'string',
                'nullable',
            ],
            'legends_link' => [
                'string',
                'nullable',
            ],
            'legends_button_text' => [
                'string',
                'nullable',
            ],
            'language_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
