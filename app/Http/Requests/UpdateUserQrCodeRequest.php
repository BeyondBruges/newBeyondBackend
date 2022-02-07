<?php

namespace App\Http\Requests;

use App\Models\UserQrCode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserQrCodeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_qr_code_edit');
    }

    public function rules()
    {
        return [];
    }
}
