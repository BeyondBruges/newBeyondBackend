<?php

namespace App\Http\Requests;

use App\Models\Company;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('company_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:companies',
            ],
            'email' => [
                'required',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'lat' => [
                'string',
                'nullable',
            ],
            'lng' => [
                'string',
                'nullable',
            ],
            'google_analyitics' => [
                'string',
                'nullable',
            ],
            'sendinblue_user' => [
                'string',
                'nullable',
            ],
            'sendinblue_password' => [
                'string',
                'nullable',
            ],
            'onesignal_appid' => [
                'string',
                'nullable',
            ],
            'onesignal_apikey' => [
                'string',
                'nullable',
            ],
        ];
    }
}
