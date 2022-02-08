<?php

namespace App\Http\Requests;

use App\Models\AppMenuButton;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAppMenuButtonRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('app_menu_button_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:app_menu_buttons,id',
        ];
    }
}
