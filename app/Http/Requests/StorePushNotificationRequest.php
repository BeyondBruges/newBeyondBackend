<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StorePushNotificationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('notification_create');
    }

    public function rules()
    {
        return [
            'key' => [
                'string',
                'required',
            ],
            'en_title' => [
                'string',
                'required',
            ],
            'es_title' => [
                'string',
                'required',
            ],
            'nl_title' => [
                'string',
                'required',
            ],
            'fr_title' => [
                'string',
                'required',
            ],
            'en_content' => [
                'string',
                'required',
            ],
            'es_content' => [
                'string',
                'required',
            ],
            'nl_content' => [
                'string',
                'required',
            ],
            'fr_content' => [
                'string',
                'required',
            ],
        ];
    }
}
