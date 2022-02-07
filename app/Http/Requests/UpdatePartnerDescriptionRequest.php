<?php

namespace App\Http\Requests;

use App\Models\PartnerDescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePartnerDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('partner_description_edit');
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
