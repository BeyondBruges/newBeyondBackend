<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserGameLevelRequest;
use App\Http\Requests\StoreUserGameLevelRequest;
use App\Http\Requests\UpdateUserGameLevelRequest;
use App\Models\Level;
use App\Models\User;
use App\Models\UserGameLevel;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class UserGameLevelController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userLevels = UserGameLevel::with(['user', 'level'])->get();

        return view('admin.userGameLevels.index', compact('userLevels'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_level_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $levels = Level::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userGameLevels.create', compact('levels', 'users'));
    }

    public function store(StoreUserGameLevelRequest $request)
    {
        $userLevel = UserGameLevel::create($request->all());

        return redirect()->route('admin.user-game-levels.index');
    }

    public function edit(UserGameLevel $userGameLevel)
    {
        abort_if(Gate::denies('user_level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $levels = Level::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userLevel = UserGameLevel::Find($userGameLevel->id);

        $userLevel->load('user', 'level');

        return view('admin.userGameLevels.edit', compact('levels', 'userLevel', 'users'));
    }

    public function update(UpdateUserGameLevelRequest $request, UserGameLevel $userGameLevel)
    {
        $userGameLevel->update($request->all());

        return redirect()->route('admin.user-game-levels.index');
    }

    public function show(UserGameLevel $userGameLevel)
    {
        abort_if(Gate::denies('user_level_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userLevel = UserGameLevel::Find($userGameLevel->id);

        $userLevel->load('user', 'level');

        return view('admin.userGameLevels.show', compact('userLevel'));
    }

    public function destroy(UserGameLevel $userGameLevel)
    {
        abort_if(Gate::denies('user_level_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userGameLevel->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserGameLevelRequest $request)
    {
        UserGameLevel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
