<?php

namespace App\Http\Requests;

use App\Models\UserTransaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_transaction_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'transaction_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
