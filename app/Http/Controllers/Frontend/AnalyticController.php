<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAnalyticRequest;
use App\Http\Requests\StoreAnalyticRequest;
use App\Http\Requests\UpdateAnalyticRequest;
use App\Models\Analytic;
use App\Models\AnalyticType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnalyticController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('analytic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $analytics = Analytic::with(['type'])->get();

        return view('frontend.analytics.index', compact('analytics'));
    }

    public function create()
    {
        abort_if(Gate::denies('analytic_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = AnalyticType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.analytics.create', compact('types'));
    }

    public function store(StoreAnalyticRequest $request)
    {
        $analytic = Analytic::create($request->all());

        return redirect()->route('frontend.analytics.index');
    }

    public function edit(Analytic $analytic)
    {
        abort_if(Gate::denies('analytic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = AnalyticType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $analytic->load('type');

        return view('frontend.analytics.edit', compact('analytic', 'types'));
    }

    public function update(UpdateAnalyticRequest $request, Analytic $analytic)
    {
        $analytic->update($request->all());

        return redirect()->route('frontend.analytics.index');
    }

    public function show(Analytic $analytic)
    {
        abort_if(Gate::denies('analytic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $analytic->load('type');

        return view('frontend.analytics.show', compact('analytic'));
    }

    public function destroy(Analytic $analytic)
    {
        abort_if(Gate::denies('analytic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $analytic->delete();

        return back();
    }

    public function massDestroy(MassDestroyAnalyticRequest $request)
    {
        Analytic::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
