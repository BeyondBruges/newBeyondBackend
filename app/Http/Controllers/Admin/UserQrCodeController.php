<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserQrCodeRequest;
use App\Http\Requests\StoreUserQrCodeRequest;
use App\Http\Requests\UpdateUserQrCodeRequest;
use App\Models\QrCode;
use App\Models\User;
use App\Models\UserQrCode;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserQrCodeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_qr_code_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userQrCodes = UserQrCode::with(['user', 'qr'])->get();

        return view('admin.userQrCodes.index', compact('userQrCodes'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_qr_code_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $qrs = QrCode::pluck('transaction_total', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userQrCodes.create', compact('qrs', 'users'));
    }

    public function store(StoreUserQrCodeRequest $request)
    {
        $userQrCode = UserQrCode::create($request->all());

        return redirect()->route('admin.user-qr-codes.index');
    }

    public function edit(UserQrCode $userQrCode)
    {
        abort_if(Gate::denies('user_qr_code_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $qrs = QrCode::pluck('transaction_total', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userQrCode->load('user', 'qr');

        return view('admin.userQrCodes.edit', compact('qrs', 'userQrCode', 'users'));
    }

    public function update(UpdateUserQrCodeRequest $request, UserQrCode $userQrCode)
    {
        $userQrCode->update($request->all());

        return redirect()->route('admin.user-qr-codes.index');
    }

    public function show(UserQrCode $userQrCode)
    {
        abort_if(Gate::denies('user_qr_code_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userQrCode->load('user', 'qr');

        return view('admin.userQrCodes.show', compact('userQrCode'));
    }

    public function destroy(UserQrCode $userQrCode)
    {
        abort_if(Gate::denies('user_qr_code_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userQrCode->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserQrCodeRequest $request)
    {
        UserQrCode::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
