<?php

namespace App\Http\Requests;

use App\Models\Hotspot;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHotspotRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hotspot_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'level_id' => [
                'required',
                'integer',
            ],
            'key' => [
                'string',
                'nullable',
            ],
        ];
    }
}
