<?php

namespace App\Http\Requests;

use App\Models\PartnerUser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePartnerUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('partner_user_create');
    }

    public function rules()
    {
        return [
            'partner_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
