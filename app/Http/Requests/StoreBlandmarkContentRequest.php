<?php

namespace App\Http\Requests;

use App\Models\BlandmarkContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBlandmarkContentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('blandmark_content_create');
    }

    public function rules()
    {
        return [
            'landmark_id' => [
                'required',
                'integer',
            ],
            'key' => [
                'string',
                'required',
            ],
        ];
    }
}
