<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUrlVideoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('url_videos_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'url' => [
                'string',
                'required',
            ],
        ];
    }
}
