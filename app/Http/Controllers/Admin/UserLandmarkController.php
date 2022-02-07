<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserLandmarkRequest;
use App\Http\Requests\StoreUserLandmarkRequest;
use App\Http\Requests\UpdateUserLandmarkRequest;
use App\Models\BLandMark;
use App\Models\User;
use App\Models\UserLandmark;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserLandmarkController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_landmark_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userLandmarks = UserLandmark::with(['user', 'landmark'])->get();

        return view('admin.userLandmarks.index', compact('userLandmarks'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_landmark_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $landmarks = BLandMark::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userLandmarks.create', compact('landmarks', 'users'));
    }

    public function store(StoreUserLandmarkRequest $request)
    {
        $userLandmark = UserLandmark::create($request->all());

        return redirect()->route('admin.user-landmarks.index');
    }

    public function edit(UserLandmark $userLandmark)
    {
        abort_if(Gate::denies('user_landmark_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $landmarks = BLandMark::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userLandmark->load('user', 'landmark');

        return view('admin.userLandmarks.edit', compact('landmarks', 'userLandmark', 'users'));
    }

    public function update(UpdateUserLandmarkRequest $request, UserLandmark $userLandmark)
    {
        $userLandmark->update($request->all());

        return redirect()->route('admin.user-landmarks.index');
    }

    public function show(UserLandmark $userLandmark)
    {
        abort_if(Gate::denies('user_landmark_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userLandmark->load('user', 'landmark');

        return view('admin.userLandmarks.show', compact('userLandmark'));
    }

    public function destroy(UserLandmark $userLandmark)
    {
        abort_if(Gate::denies('user_landmark_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userLandmark->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserLandmarkRequest $request)
    {
        UserLandmark::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
