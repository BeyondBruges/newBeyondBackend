<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBLandMarkRequest;
use App\Http\Requests\StoreBLandMarkRequest;
use App\Http\Requests\UpdateBLandMarkRequest;
use App\Models\BLandMark;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BLandMarkController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('b_land_mark_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bLandMarks = BLandMark::with(['media'])->get();

        return view('admin.bLandMarks.index', compact('bLandMarks'));
    }

    public function create()
    {
        abort_if(Gate::denies('b_land_mark_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bLandMarks.create');
    }

    public function store(StoreBLandMarkRequest $request)
    {
        $bLandMark = BLandMark::create($request->all());

        if ($request->input('image', false)) {
            $bLandMark->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $bLandMark->id]);
        }

        return redirect()->route('admin.b-land-marks.index');
    }

    public function edit(BLandMark $bLandMark)
    {
        abort_if(Gate::denies('b_land_mark_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bLandMarks.edit', compact('bLandMark'));
    }

    public function update(UpdateBLandMarkRequest $request, BLandMark $bLandMark)
    {
        $bLandMark->update($request->all());

        if ($request->input('image', false)) {
            if (!$bLandMark->image || $request->input('image') !== $bLandMark->image->file_name) {
                if ($bLandMark->image) {
                    $bLandMark->image->delete();
                }
                $bLandMark->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($bLandMark->image) {
            $bLandMark->image->delete();
        }

        return redirect()->route('admin.b-land-marks.index');
    }

    public function show(BLandMark $bLandMark)
    {
        abort_if(Gate::denies('b_land_mark_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bLandMark->load('landmarkBlandmarkContents');

        return view('admin.bLandMarks.show', compact('bLandMark'));
    }

    public function destroy(BLandMark $bLandMark)
    {
        abort_if(Gate::denies('b_land_mark_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bLandMark->delete();

        return back();
    }

    public function massDestroy(MassDestroyBLandMarkRequest $request)
    {
        BLandMark::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('b_land_mark_create') && Gate::denies('b_land_mark_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BLandMark();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
