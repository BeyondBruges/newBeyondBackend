<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLevelObjectRequest;
use App\Http\Requests\StoreLevelObjectRequest;
use App\Http\Requests\UpdateLevelObjectRequest;
use App\Models\Level;
use App\Models\LevelObject;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class LevelObjectController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('level_object_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $levelObjects = LevelObject::with(['level'])->get();

        $levels = Level::get();

        return view('admin.levelObjects.index', compact('levelObjects', 'levels'));
    }

    public function create()
    {
        abort_if(Gate::denies('level_object_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $levels = Level::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.levelObjects.create', compact('levels'));
    }

    public function store(StoreLevelObjectRequest $request)
    {
        $levelObject = LevelObject::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $levelObject->id]);
        }

        return redirect()->route('admin.level-objects.index');
    }

    public function edit(LevelObject $levelObject)
    {
        abort_if(Gate::denies('level_object_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $levels = Level::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $levelObject->load('level');

        return view('admin.levelObjects.edit', compact('levelObject', 'levels'));
    }

    public function update(UpdateLevelObjectRequest $request, LevelObject $levelObject)
    {
        $levelObject->update($request->all());

        return redirect()->route('admin.level-objects.index');
    }

    public function show(LevelObject $levelObject)
    {
        abort_if(Gate::denies('level_object_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $levelObject->load('level');

        return view('admin.levelObjects.show', compact('levelObject'));
    }

    public function destroy(LevelObject $levelObject)
    {
        abort_if(Gate::denies('level_object_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $levelObject->delete();

        return back();
    }

    public function massDestroy(MassDestroyLevelObjectRequest $request)
    {
        LevelObject::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('level_object_create') && Gate::denies('level_object_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new LevelObject();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
