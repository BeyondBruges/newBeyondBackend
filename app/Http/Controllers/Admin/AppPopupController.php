<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAppPopupRequest;
use App\Http\Requests\StoreAppPopupRequest;
use App\Http\Requests\UpdateAppPopupRequest;
use App\Models\AppPopup;
use App\Models\Language;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AppPopupController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('app_popup_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appPopups = AppPopup::with(['language'])->get();

        return view('admin.appPopups.index', compact('appPopups'));
    }

    public function create()
    {
        abort_if(Gate::denies('app_popup_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.appPopups.create', compact('languages'));
    }

    public function store(StoreAppPopupRequest $request)
    {
        $appPopup = AppPopup::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $appPopup->id]);
        }

        return redirect()->route('admin.app-popups.index');
    }

    public function edit(AppPopup $appPopup)
    {
        abort_if(Gate::denies('app_popup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $appPopup->load('language');

        return view('admin.appPopups.edit', compact('appPopup', 'languages'));
    }

    public function update(UpdateAppPopupRequest $request, AppPopup $appPopup)
    {
        $appPopup->update($request->all());

        return redirect()->route('admin.app-popups.index');
    }

    public function show(AppPopup $appPopup)
    {
        abort_if(Gate::denies('app_popup_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appPopup->load('language');

        return view('admin.appPopups.show', compact('appPopup'));
    }

    public function destroy(AppPopup $appPopup)
    {
        abort_if(Gate::denies('app_popup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appPopup->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppPopupRequest $request)
    {
        AppPopup::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('app_popup_create') && Gate::denies('app_popup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AppPopup();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
