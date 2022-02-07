<?php

namespace App\Http\Requests;

use App\Models\ContactText;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContactTextRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_text_create');
    }

    public function rules()
    {
        return [
            'contact_title' => [
                'string',
                'nullable',
            ],
            'contact_subtitle' => [
                'string',
                'nullable',
            ],
        ];
    }
}
