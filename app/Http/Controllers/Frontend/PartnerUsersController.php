<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPartnerUserRequest;
use App\Http\Requests\StorePartnerUserRequest;
use App\Http\Requests\UpdatePartnerUserRequest;
use App\Models\Partner;
use App\Models\PartnerUser;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartnerUsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('partner_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerUsers = PartnerUser::with(['partner', 'user'])->get();

        return view('frontend.partnerUsers.index', compact('partnerUsers'));
    }

    public function create()
    {
        abort_if(Gate::denies('partner_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = Partner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.partnerUsers.create', compact('partners', 'users'));
    }

    public function store(StorePartnerUserRequest $request)
    {
        $partnerUser = PartnerUser::create($request->all());

        return redirect()->route('frontend.partner-users.index');
    }

    public function edit(PartnerUser $partnerUser)
    {
        abort_if(Gate::denies('partner_user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = Partner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partnerUser->load('partner', 'user');

        return view('frontend.partnerUsers.edit', compact('partnerUser', 'partners', 'users'));
    }

    public function update(UpdatePartnerUserRequest $request, PartnerUser $partnerUser)
    {
        $partnerUser->update($request->all());

        return redirect()->route('frontend.partner-users.index');
    }

    public function show(PartnerUser $partnerUser)
    {
        abort_if(Gate::denies('partner_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerUser->load('partner', 'user');

        return view('frontend.partnerUsers.show', compact('partnerUser'));
    }

    public function destroy(PartnerUser $partnerUser)
    {
        abort_if(Gate::denies('partner_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerUser->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartnerUserRequest $request)
    {
        PartnerUser::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
