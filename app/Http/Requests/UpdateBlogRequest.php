<?php

namespace App\Http\Requests;

use App\Models\Blog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBlogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('blog_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'excerpt' => [
                'string',
                'required',
            ],
            'gallery' => [
                'array',
            ],
            'description' => [
                'required',
            ],
            'language_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
