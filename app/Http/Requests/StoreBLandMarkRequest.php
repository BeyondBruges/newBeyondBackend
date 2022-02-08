<?php

namespace App\Http\Requests;

use App\Models\BLandMark;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBLandMarkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('b_land_mark_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'address' => [
                'required',
            ],
            'lat' => [
                'numeric',
                'required',
            ],
            'lng' => [
                'numeric',
                'required',
            ],
            'image' => [
                'required',
            ],
            'key' => [
                'string',
                'required',
            ],
        ];
    }
}
