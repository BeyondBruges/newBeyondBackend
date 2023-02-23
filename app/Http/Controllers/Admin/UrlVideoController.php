<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUrlVideoRequest;
use App\Http\Requests\StoreUrlVideoRequest;
use App\Http\Requests\UpdateUrlVideoRequest;
use App\Models\UrlVideo;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;


class UrlVideoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('url_videos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $videos = UrlVideo::all();

        return view('admin.urlvideos.index', compact('videos'));
    }

    public function create()
    {
        abort_if(Gate::denies('url_videos_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.urlvideos.create');
    }

    public function store(StoreUrlVideoRequest $request)
    {
        $urleVideo = UrlVideo::create($request->all());

        return redirect()->route('admin.url-videos.index');
    }

    public function edit(UrlVideo $urlVideo)
    {
        abort_if(Gate::denies('url_videos_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.urlvideos.edit', compact('urlVideo'));
    }

    public function update(UpdateUrlVideoRequest $request, UrlVideo $urlVideo)
    {
        $urlVideo->update($request->all());

        return redirect()->route('admin.url-videos.index');
    }

    public function show(UrlVideo $urlVideo)
    {
        abort_if(Gate::denies('url_videos_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.urlvideos.show', compact('urlVideo'));
    }

    public function destroy(UrlVideo $urlVideo)
    {
        abort_if(Gate::denies('url_videos_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $urlVideo->delete();

        return back();
    }

    public function massDestroy(MassDestroyUrlVideoRequest $request)
    {
        UrlVideo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
