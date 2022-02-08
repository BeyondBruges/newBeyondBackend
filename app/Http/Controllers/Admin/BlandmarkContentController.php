<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBlandmarkContentRequest;
use App\Http\Requests\StoreBlandmarkContentRequest;
use App\Http\Requests\UpdateBlandmarkContentRequest;
use App\Models\BLandMark;
use App\Models\BlandmarkContent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlandmarkContentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('blandmark_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blandmarkContents = BlandmarkContent::with(['landmark'])->get();

        $b_land_marks = BLandMark::get();

        return view('admin.blandmarkContents.index', compact('b_land_marks', 'blandmarkContents'));
    }

    public function create()
    {
        abort_if(Gate::denies('blandmark_content_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landmarks = BLandMark::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.blandmarkContents.create', compact('landmarks'));
    }

    public function store(StoreBlandmarkContentRequest $request)
    {
        $blandmarkContent = BlandmarkContent::create($request->all());

        return redirect()->route('admin.blandmark-contents.index');
    }

    public function edit(BlandmarkContent $blandmarkContent)
    {
        abort_if(Gate::denies('blandmark_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landmarks = BLandMark::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $blandmarkContent->load('landmark');

        return view('admin.blandmarkContents.edit', compact('blandmarkContent', 'landmarks'));
    }

    public function update(UpdateBlandmarkContentRequest $request, BlandmarkContent $blandmarkContent)
    {
        $blandmarkContent->update($request->all());

        return redirect()->route('admin.blandmark-contents.index');
    }

    public function show(BlandmarkContent $blandmarkContent)
    {
        abort_if(Gate::denies('blandmark_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blandmarkContent->load('landmark');

        return view('admin.blandmarkContents.show', compact('blandmarkContent'));
    }

    public function destroy(BlandmarkContent $blandmarkContent)
    {
        abort_if(Gate::denies('blandmark_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blandmarkContent->delete();

        return back();
    }

    public function massDestroy(MassDestroyBlandmarkContentRequest $request)
    {
        BlandmarkContent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
