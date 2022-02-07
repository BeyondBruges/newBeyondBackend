<?php

namespace App\Http\Requests;

use App\Models\Slider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSliderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('slider_create');
    }

    public function rules()
    {
        return [
            'hero_title' => [
                'string',
                'nullable',
            ],
            'hero_subtitle' => [
                'string',
                'nullable',
            ],
            'button_text' => [
                'string',
                'nullable',
            ],
            'button_url' => [
                'string',
                'nullable',
            ],
            'image' => [
                'array',
            ],
            'button_2_text' => [
                'string',
                'nullable',
            ],
            'button_2_url' => [
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
