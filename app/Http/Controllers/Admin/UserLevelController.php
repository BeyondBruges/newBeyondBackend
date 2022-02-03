<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserLevelRequest;
use App\Http\Requests\StoreUserLevelRequest;
use App\Http\Requests\UpdateUserLevelRequest;
use App\Models\Level;
use App\Models\User;
use App\Models\UserLevel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserLevelController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userLevels = UserLevel::with(['user', 'level'])->get();

        return view('admin.userLevels.index', compact('userLevels'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_level_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $levels = Level::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userLevels.create', compact('levels', 'users'));
    }

    public function store(StoreUserLevelRequest $request)
    {
        $userLevel = UserLevel::create($request->all());

        return redirect()->route('admin.user-levels.index');
    }

    public function edit(UserLevel $userLevel)
    {
        abort_if(Gate::denies('user_level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $levels = Level::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userLevel->load('user', 'level');

        return view('admin.userLevels.edit', compact('levels', 'userLevel', 'users'));
    }

    public function update(UpdateUserLevelRequest $request, UserLevel $userLevel)
    {
        $userLevel->update($request->all());

        return redirect()->route('admin.user-levels.index');
    }

    public function show(UserLevel $userLevel)
    {
        abort_if(Gate::denies('user_level_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userLevel->load('user', 'level');

        return view('admin.userLevels.show', compact('userLevel'));
    }

    public function destroy(UserLevel $userLevel)
    {
        abort_if(Gate::denies('user_level_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userLevel->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserLevelRequest $request)
    {
        UserLevel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
