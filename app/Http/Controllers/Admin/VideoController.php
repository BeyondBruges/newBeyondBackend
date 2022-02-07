<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyVideoRequest;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Language;
use App\Models\Video;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VideoController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('video_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $videos = Video::with(['language'])->get();

        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        abort_if(Gate::denies('video_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.videos.create', compact('languages'));
    }

    public function store(StoreVideoRequest $request)
    {
        $video = Video::create($request->all());

        return redirect()->route('admin.videos.index');
    }

    public function edit(Video $video)
    {
        abort_if(Gate::denies('video_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $video->load('language');

        return view('admin.videos.edit', compact('languages', 'video'));
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        $video->update($request->all());

        return redirect()->route('admin.videos.index');
    }

    public function show(Video $video)
    {
        abort_if(Gate::denies('video_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $video->load('language');

        return view('admin.videos.show', compact('video'));
    }

    public function destroy(Video $video)
    {
        abort_if(Gate::denies('video_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $video->delete();

        return back();
    }

    public function massDestroy(MassDestroyVideoRequest $request)
    {
        Video::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
