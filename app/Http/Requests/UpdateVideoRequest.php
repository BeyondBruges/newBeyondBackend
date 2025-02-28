<?php

namespace App\Http\Requests;

use App\Models\Video;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVideoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('video_edit');
    }

    public function rules()
    {
        return [
            'youtube' => [
                'string',
                'required',
                'unique:videos,youtube,' . request()->route('video')->id,
            ],
        ];
    }
}
