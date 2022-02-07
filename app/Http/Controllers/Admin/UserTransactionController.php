<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserTransactionRequest;
use App\Http\Requests\StoreUserTransactionRequest;
use App\Http\Requests\UpdateUserTransactionRequest;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserTransaction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserTransactionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userTransactions = UserTransaction::with(['user', 'transaction'])->get();

        return view('admin.userTransactions.index', compact('userTransactions'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_transaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transactions = Transaction::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userTransactions.create', compact('transactions', 'users'));
    }

    public function store(StoreUserTransactionRequest $request)
    {
        $userTransaction = UserTransaction::create($request->all());

        return redirect()->route('admin.user-transactions.index');
    }

    public function edit(UserTransaction $userTransaction)
    {
        abort_if(Gate::denies('user_transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transactions = Transaction::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userTransaction->load('user', 'transaction');

        return view('admin.userTransactions.edit', compact('transactions', 'userTransaction', 'users'));
    }

    public function update(UpdateUserTransactionRequest $request, UserTransaction $userTransaction)
    {
        $userTransaction->update($request->all());

        return redirect()->route('admin.user-transactions.index');
    }

    public function show(UserTransaction $userTransaction)
    {
        abort_if(Gate::denies('user_transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userTransaction->load('user', 'transaction');

        return view('admin.userTransactions.show', compact('userTransaction'));
    }

    public function destroy(UserTransaction $userTransaction)
    {
        abort_if(Gate::denies('user_transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userTransaction->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserTransactionRequest $request)
    {
        UserTransaction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
