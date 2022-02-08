<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserLevelObjectRequest;
use App\Http\Requests\StoreUserLevelObjectRequest;
use App\Http\Requests\UpdateUserLevelObjectRequest;
use App\Models\LevelObject;
use App\Models\User;
use App\Models\UserLevelObject;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserLevelObjectController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_level_object_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userLevelObjects = UserLevelObject::with(['user', 'level_object'])->get();

        return view('admin.userLevelObjects.index', compact('userLevelObjects'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_level_object_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $level_objects = LevelObject::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userLevelObjects.create', compact('level_objects', 'users'));
    }

    public function store(StoreUserLevelObjectRequest $request)
    {
        $userLevelObject = UserLevelObject::create($request->all());

        return redirect()->route('admin.user-level-objects.index');
    }

    public function edit(UserLevelObject $userLevelObject)
    {
        abort_if(Gate::denies('user_level_object_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $level_objects = LevelObject::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userLevelObject->load('user', 'level_object');

        return view('admin.userLevelObjects.edit', compact('level_objects', 'userLevelObject', 'users'));
    }

    public function update(UpdateUserLevelObjectRequest $request, UserLevelObject $userLevelObject)
    {
        $userLevelObject->update($request->all());

        return redirect()->route('admin.user-level-objects.index');
    }

    public function show(UserLevelObject $userLevelObject)
    {
        abort_if(Gate::denies('user_level_object_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userLevelObject->load('user', 'level_object');

        return view('admin.userLevelObjects.show', compact('userLevelObject'));
    }

    public function destroy(UserLevelObject $userLevelObject)
    {
        abort_if(Gate::denies('user_level_object_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userLevelObject->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserLevelObjectRequest $request)
    {
        UserLevelObject::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
