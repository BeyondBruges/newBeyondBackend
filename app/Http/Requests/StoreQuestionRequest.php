<?php

namespace App\Http\Requests;

use App\Models\Question;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('question_create');
    }

    public function rules()
    {
        return [
            'level_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'required',
            ],
            'content' => [
                'required',
            ],
            'option_b' => [
                'string',
                'nullable',
            ],
            'option_c' => [
                'string',
                'nullable',
            ],
            'correct' => [
                'string',
                'nullable',
            ],
        ];
    }
}
