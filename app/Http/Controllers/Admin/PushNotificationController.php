<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPushNotificationRequest;
use App\Http\Requests\StorePushNotificationRequest;
use App\Http\Requests\UpdatePushNotificationRequest;
use App\Models\PushNotification;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PushNotificationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('notification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notifications = PushNotification::all();

        return view('admin.pushNotifications.index', compact('notifications'));
    }

    public function create()
    {
        abort_if(Gate::denies('notification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pushNotifications.create');
    }

    public function store(StorePushNotificationRequest $request)
    {
        $notification = PushNotification::create($request->all());

        return redirect()->route('admin.push-notifications.index');
    }

    public function edit(PushNotification $pushNotification)
    {
        abort_if(Gate::denies('notification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notification = PushNotification::Find($pushNotification->id);

        return view('admin.pushNotifications.edit', compact('notification'));
    }

    public function update(UpdatePushNotificationRequest $request, PushNotification $pushNotification)
    {
        $notification = PushNotification::Find($pushNotification->id);

        $notification->update($request->all());

        return redirect()->route('admin.push-notifications.index');
    }

    public function show(PushNotification $pushNotification)
    {
        abort_if(Gate::denies('notification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notification = PushNotification::Find($pushNotification->id);

        return view('admin.pushNotifications.show', compact('notification'));
    }

    public function destroy(PushNotification $pushNotification)
    {
        abort_if(Gate::denies('notification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notification = PushNotification::Find($pushNotification->id);

        $notification->delete();

        return back();
    }

    public function massDestroy(MassDestroyPushNotificationRequest $request)
    {
        PushNotification::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
