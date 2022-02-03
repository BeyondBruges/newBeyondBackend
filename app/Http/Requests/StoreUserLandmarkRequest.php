<?php

namespace App\Http\Requests;

use App\Models\UserLandmark;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserLandmarkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_landmark_create');
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
