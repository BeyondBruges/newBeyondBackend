<?php

namespace App\Http\Requests;

use App\Models\UserFeedback;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserFeedbackRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_feedback_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
