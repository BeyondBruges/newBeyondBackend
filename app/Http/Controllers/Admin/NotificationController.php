<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNotificationRequest;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use App\Models\Language;
use App\Models\Notification;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('notification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notifications = Notification::with(['language'])->get();

        return view('admin.notifications.index', compact('notifications'));
    }

    public function create()
    {
        abort_if(Gate::denies('notification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.notifications.create', compact('languages'));
    }

    public function store(StoreNotificationRequest $request)
    {
        $notification = Notification::create($request->all());

        return redirect()->route('admin.notifications.index');
    }

    public function edit(Notification $notification)
    {
        abort_if(Gate::denies('notification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $languages = Language::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $notification->load('language');

        return view('admin.notifications.edit', compact('languages', 'notification'));
    }

    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        $notification->update($request->all());

        return redirect()->route('admin.notifications.index');
    }

    public function show(Notification $notification)
    {
        abort_if(Gate::denies('notification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notification->load('language');

        return view('admin.notifications.show', compact('notification'));
    }

    public function destroy(Notification $notification)
    {
        abort_if(Gate::denies('notification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notification->delete();

        return back();
    }

    public function massDestroy(MassDestroyNotificationRequest $request)
    {
        Notification::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
