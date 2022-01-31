<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLevelRequest;
use App\Http\Requests\StoreLevelRequest;
use App\Http\Requests\UpdateLevelRequest;
use App\Models\Level;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class LevelController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $levels = Level::with(['media'])->get();

        return view('frontend.levels.index', compact('levels'));
    }

    public function create()
    {
        abort_if(Gate::denies('level_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.levels.create');
    }

    public function store(StoreLevelRequest $request)
    {
        $level = Level::create($request->all());

        if ($request->input('image', false)) {
            $level->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $level->id]);
        }

        return redirect()->route('frontend.levels.index');
    }

    public function edit(Level $level)
    {
        abort_if(Gate::denies('level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.levels.edit', compact('level'));
    }

    public function update(UpdateLevelRequest $request, Level $level)
    {
        $level->update($request->all());

        if ($request->input('image', false)) {
            if (!$level->image || $request->input('image') !== $level->image->file_name) {
                if ($level->image) {
                    $level->image->delete();
                }
                $level->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($level->image) {
            $level->image->delete();
        }

        return redirect()->route('frontend.levels.index');
    }

    public function show(Level $level)
    {
        abort_if(Gate::denies('level_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.levels.show', compact('level'));
    }

    public function destroy(Level $level)
    {
        abort_if(Gate::denies('level_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $level->delete();

        return back();
    }

    public function massDestroy(MassDestroyLevelRequest $request)
    {
        Level::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('level_create') && Gate::denies('level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Level();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
