<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQrCodeRequest;
use App\Http\Requests\StoreQrCodeRequest;
use App\Http\Requests\UpdateQrCodeRequest;
use App\Models\Partner;
use App\Models\QrCode;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QrCodeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('qr_code_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrCodes = QrCode::with(['user', 'partner'])->get();

        return view('frontend.qrCodes.index', compact('qrCodes'));
    }

    public function create()
    {
        abort_if(Gate::denies('qr_code_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partners = Partner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.qrCodes.create', compact('partners', 'users'));
    }

    public function store(StoreQrCodeRequest $request)
    {
        $qrCode = QrCode::create($request->all());

        return redirect()->route('frontend.qr-codes.index');
    }

    public function edit(QrCode $qrCode)
    {
        abort_if(Gate::denies('qr_code_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partners = Partner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $qrCode->load('user', 'partner');

        return view('frontend.qrCodes.edit', compact('partners', 'qrCode', 'users'));
    }

    public function update(UpdateQrCodeRequest $request, QrCode $qrCode)
    {
        $qrCode->update($request->all());

        return redirect()->route('frontend.qr-codes.index');
    }

    public function show(QrCode $qrCode)
    {
        abort_if(Gate::denies('qr_code_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrCode->load('user', 'partner');

        return view('frontend.qrCodes.show', compact('qrCode'));
    }

    public function destroy(QrCode $qrCode)
    {
        abort_if(Gate::denies('qr_code_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrCode->delete();

        return back();
    }

    public function massDestroy(MassDestroyQrCodeRequest $request)
    {
        QrCode::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
