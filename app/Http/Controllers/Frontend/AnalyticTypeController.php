<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAnalyticTypeRequest;
use App\Http\Requests\StoreAnalyticTypeRequest;
use App\Http\Requests\UpdateAnalyticTypeRequest;
use App\Models\AnalyticType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnalyticTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('analytic_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $analyticTypes = AnalyticType::all();

        return view('frontend.analyticTypes.index', compact('analyticTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('analytic_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.analyticTypes.create');
    }

    public function store(StoreAnalyticTypeRequest $request)
    {
        $analyticType = AnalyticType::create($request->all());

        return redirect()->route('frontend.analytic-types.index');
    }

    public function edit(AnalyticType $analyticType)
    {
        abort_if(Gate::denies('analytic_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.analyticTypes.edit', compact('analyticType'));
    }

    public function update(UpdateAnalyticTypeRequest $request, AnalyticType $analyticType)
    {
        $analyticType->update($request->all());

        return redirect()->route('frontend.analytic-types.index');
    }

    public function show(AnalyticType $analyticType)
    {
        abort_if(Gate::denies('analytic_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.analyticTypes.show', compact('analyticType'));
    }

    public function destroy(AnalyticType $analyticType)
    {
        abort_if(Gate::denies('analytic_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $analyticType->delete();

        return back();
    }

    public function massDestroy(MassDestroyAnalyticTypeRequest $request)
    {
        AnalyticType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
