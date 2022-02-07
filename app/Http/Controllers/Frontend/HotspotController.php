<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHotspotRequest;
use App\Http\Requests\StoreHotspotRequest;
use App\Http\Requests\UpdateHotspotRequest;
use App\Models\Hotspot;
use App\Models\Level;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HotspotController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hotspot_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotspots = Hotspot::with(['level'])->get();

        return view('frontend.hotspots.index', compact('hotspots'));
    }

    public function create()
    {
        abort_if(Gate::denies('hotspot_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $levels = Level::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.hotspots.create', compact('levels'));
    }

    public function store(StoreHotspotRequest $request)
    {
        $hotspot = Hotspot::create($request->all());

        return redirect()->route('frontend.hotspots.index');
    }

    public function edit(Hotspot $hotspot)
    {
        abort_if(Gate::denies('hotspot_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $levels = Level::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hotspot->load('level');

        return view('frontend.hotspots.edit', compact('hotspot', 'levels'));
    }

    public function update(UpdateHotspotRequest $request, Hotspot $hotspot)
    {
        $hotspot->update($request->all());

        return redirect()->route('frontend.hotspots.index');
    }

    public function show(Hotspot $hotspot)
    {
        abort_if(Gate::denies('hotspot_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotspot->load('level');

        return view('frontend.hotspots.show', compact('hotspot'));
    }

    public function destroy(Hotspot $hotspot)
    {
        abort_if(Gate::denies('hotspot_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotspot->delete();

        return back();
    }

    public function massDestroy(MassDestroyHotspotRequest $request)
    {
        Hotspot::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
