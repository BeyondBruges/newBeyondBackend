<?php

namespace App\Http\Requests;

use App\Models\Partner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePartnerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('partner_create');
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
                'nullable',
            ],
            'lat' => [
                'numeric',
            ],
            'lng' => [
                'numeric',
            ],
            'gallery' => [
                'array',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'tiktok' => [
                'string',
                'nullable',
            ],
            'email' => [
                'required',
                'unique:partners',
            ],
        ];
    }
}
