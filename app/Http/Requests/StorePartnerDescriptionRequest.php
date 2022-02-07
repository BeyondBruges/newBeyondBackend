<?php

namespace App\Http\Requests;

use App\Models\PartnerDescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePartnerDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('partner_description_create');
    }

    public function rules()
    {
        return [
            'language_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
