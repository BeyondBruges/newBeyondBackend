<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPartnerDescriptionRequest;
use App\Http\Requests\StorePartnerDescriptionRequest;
use App\Http\Requests\UpdatePartnerDescriptionRequest;
use App\Models\Language;
use App\Models\Partner;
use App\Models\PartnerDescription;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartnerDescriptionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('partner_description_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerDescriptions = PartnerDescription::with(['partner', 'language'])->get();

        return view('frontend.partnerDescriptions.index', compact('partnerDescriptions'));
    }

    public function create()
    {
        abort_if(Gate::denies('partner_description_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = Partner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.partnerDescriptions.create', compact('languages', 'partners'));
    }

    public function store(StorePartnerDescriptionRequest $request)
    {
        $partnerDescription = PartnerDescription::create($request->all());

        return redirect()->route('frontend.partner-descriptions.index');
    }

    public function edit(PartnerDescription $partnerDescription)
    {
        abort_if(Gate::denies('partner_description_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = Partner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partnerDescription->load('partner', 'language');

        return view('frontend.partnerDescriptions.edit', compact('languages', 'partnerDescription', 'partners'));
    }

    public function update(UpdatePartnerDescriptionRequest $request, PartnerDescription $partnerDescription)
    {
        $partnerDescription->update($request->all());

        return redirect()->route('frontend.partner-descriptions.index');
    }

    public function show(PartnerDescription $partnerDescription)
    {
        abort_if(Gate::denies('partner_description_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerDescription->load('partner', 'language');

        return view('frontend.partnerDescriptions.show', compact('partnerDescription'));
    }

    public function destroy(PartnerDescription $partnerDescription)
    {
        abort_if(Gate::denies('partner_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerDescription->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartnerDescriptionRequest $request)
    {
        PartnerDescription::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
