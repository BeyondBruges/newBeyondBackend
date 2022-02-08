<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserCharacterRequest;
use App\Http\Requests\StoreUserCharacterRequest;
use App\Http\Requests\UpdateUserCharacterRequest;
use App\Models\Character;
use App\Models\User;
use App\Models\UserCharacter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserCharacterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_character_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userCharacters = UserCharacter::with(['user', 'character'])->get();

        return view('frontend.userCharacters.index', compact('userCharacters'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_character_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $characters = Character::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.userCharacters.create', compact('characters', 'users'));
    }

    public function store(StoreUserCharacterRequest $request)
    {
        $userCharacter = UserCharacter::create($request->all());

        return redirect()->route('frontend.user-characters.index');
    }

    public function edit(UserCharacter $userCharacter)
    {
        abort_if(Gate::denies('user_character_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $characters = Character::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userCharacter->load('user', 'character');

        return view('frontend.userCharacters.edit', compact('characters', 'userCharacter', 'users'));
    }

    public function update(UpdateUserCharacterRequest $request, UserCharacter $userCharacter)
    {
        $userCharacter->update($request->all());

        return redirect()->route('frontend.user-characters.index');
    }

    public function show(UserCharacter $userCharacter)
    {
        abort_if(Gate::denies('user_character_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userCharacter->load('user', 'character');

        return view('frontend.userCharacters.show', compact('userCharacter'));
    }

    public function destroy(UserCharacter $userCharacter)
    {
        abort_if(Gate::denies('user_character_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userCharacter->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserCharacterRequest $request)
    {
        UserCharacter::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
