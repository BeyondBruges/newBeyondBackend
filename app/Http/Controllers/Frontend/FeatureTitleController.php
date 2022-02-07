<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFeatureTitleRequest;
use App\Http\Requests\StoreFeatureTitleRequest;
use App\Http\Requests\UpdateFeatureTitleRequest;
use App\Models\FeatureTitle;
use App\Models\Language;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeatureTitleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('feature_title_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $featureTitles = FeatureTitle::with(['language'])->get();

        return view('frontend.featureTitles.index', compact('featureTitles'));
    }

    public function create()
    {
        abort_if(Gate::denies('feature_title_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.featureTitles.create', compact('languages'));
    }

    public function store(StoreFeatureTitleRequest $request)
    {
        $featureTitle = FeatureTitle::create($request->all());

        return redirect()->route('frontend.feature-titles.index');
    }

    public function edit(FeatureTitle $featureTitle)
    {
        abort_if(Gate::denies('feature_title_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $featureTitle->load('language');

        return view('frontend.featureTitles.edit', compact('featureTitle', 'languages'));
    }

    public function update(UpdateFeatureTitleRequest $request, FeatureTitle $featureTitle)
    {
        $featureTitle->update($request->all());

        return redirect()->route('frontend.feature-titles.index');
    }

    public function show(FeatureTitle $featureTitle)
    {
        abort_if(Gate::denies('feature_title_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $featureTitle->load('language');

        return view('frontend.featureTitles.show', compact('featureTitle'));
    }

    public function destroy(FeatureTitle $featureTitle)
    {
        abort_if(Gate::denies('feature_title_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $featureTitle->delete();

        return back();
    }

    public function massDestroy(MassDestroyFeatureTitleRequest $request)
    {
        FeatureTitle::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
