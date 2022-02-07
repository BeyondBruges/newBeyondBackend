<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySellingPointRequest;
use App\Http\Requests\StoreSellingPointRequest;
use App\Http\Requests\UpdateSellingPointRequest;
use App\Models\Language;
use App\Models\SellingPoint;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellingPointController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('selling_point_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sellingPoints = SellingPoint::with(['language'])->get();

        return view('frontend.sellingPoints.index', compact('sellingPoints'));
    }

    public function create()
    {
        abort_if(Gate::denies('selling_point_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.sellingPoints.create', compact('languages'));
    }

    public function store(StoreSellingPointRequest $request)
    {
        $sellingPoint = SellingPoint::create($request->all());

        return redirect()->route('frontend.selling-points.index');
    }

    public function edit(SellingPoint $sellingPoint)
    {
        abort_if(Gate::denies('selling_point_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sellingPoint->load('language');

        return view('frontend.sellingPoints.edit', compact('languages', 'sellingPoint'));
    }

    public function update(UpdateSellingPointRequest $request, SellingPoint $sellingPoint)
    {
        $sellingPoint->update($request->all());

        return redirect()->route('frontend.selling-points.index');
    }

    public function show(SellingPoint $sellingPoint)
    {
        abort_if(Gate::denies('selling_point_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sellingPoint->load('language');

        return view('frontend.sellingPoints.show', compact('sellingPoint'));
    }

    public function destroy(SellingPoint $sellingPoint)
    {
        abort_if(Gate::denies('selling_point_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sellingPoint->delete();

        return back();
    }

    public function massDestroy(MassDestroySellingPointRequest $request)
    {
        SellingPoint::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
