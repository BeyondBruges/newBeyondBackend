<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserLevelQuestionRequest;
use App\Http\Requests\StoreUserLevelQuestionRequest;
use App\Http\Requests\UpdateUserLevelQuestionRequest;
use App\Models\Question;
use App\Models\User;
use App\Models\UserLevelQuestion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserLevelQuestionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_level_question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userLevelQuestions = UserLevelQuestion::with(['user', 'question'])->get();

        return view('admin.userLevelQuestions.index', compact('userLevelQuestions'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_level_question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questions = Question::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userLevelQuestions.create', compact('questions', 'users'));
    }

    public function store(StoreUserLevelQuestionRequest $request)
    {
        $question = UserLevelQuestion::where('user_id', $request->user_id)->where("question_id", $request->question_id)->first();
        if(!$question){
            $userLevelQuestion = UserLevelQuestion::create($request->all());
        }

        return redirect()->route('admin.user-level-questions.index');
    }

    public function edit(UserLevelQuestion $userLevelQuestion)
    {
        abort_if(Gate::denies('user_level_question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questions = Question::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userLevelQuestion->load('user', 'question');

        return view('admin.userLevelQuestions.edit', compact('questions', 'userLevelQuestion', 'users'));
    }

    public function update(UpdateUserLevelQuestionRequest $request, UserLevelQuestion $userLevelQuestion)
    {
        $userLevelQuestion->update($request->all());

        return redirect()->route('admin.user-level-questions.index');
    }

    public function show(UserLevelQuestion $userLevelQuestion)
    {
        abort_if(Gate::denies('user_level_question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userLevelQuestion->load('user', 'question');

        return view('admin.userLevelQuestions.show', compact('userLevelQuestion'));
    }

    public function destroy(UserLevelQuestion $userLevelQuestion)
    {
        abort_if(Gate::denies('user_level_question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userLevelQuestion->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserLevelQuestionRequest $request)
    {
        UserLevelQuestion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
