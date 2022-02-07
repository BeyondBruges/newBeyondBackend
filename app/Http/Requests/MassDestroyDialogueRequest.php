<?php

namespace App\Http\Requests;

use App\Models\Dialogue;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDialogueRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dialogue_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dialogues,id',
        ];
    }
}
