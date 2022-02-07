<?php

namespace App\Http\Requests;

use App\Models\UserLandmark;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserLandmarkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_landmark_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'landmark_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
