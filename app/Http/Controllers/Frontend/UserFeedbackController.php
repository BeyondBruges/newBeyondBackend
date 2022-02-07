<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserFeedbackRequest;
use App\Http\Requests\StoreUserFeedbackRequest;
use App\Http\Requests\UpdateUserFeedbackRequest;
use App\Models\User;
use App\Models\UserFeedback;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserFeedbackController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_feedback_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userFeedbacks = UserFeedback::with(['user'])->get();

        return view('frontend.userFeedbacks.index', compact('userFeedbacks'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_feedback_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.userFeedbacks.create', compact('users'));
    }

    public function store(StoreUserFeedbackRequest $request)
    {
        $userFeedback = UserFeedback::create($request->all());

        return redirect()->route('frontend.user-feedbacks.index');
    }

    public function edit(UserFeedback $userFeedback)
    {
        abort_if(Gate::denies('user_feedback_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userFeedback->load('user');

        return view('frontend.userFeedbacks.edit', compact('userFeedback', 'users'));
    }

    public function update(UpdateUserFeedbackRequest $request, UserFeedback $userFeedback)
    {
        $userFeedback->update($request->all());

        return redirect()->route('frontend.user-feedbacks.index');
    }

    public function show(UserFeedback $userFeedback)
    {
        abort_if(Gate::denies('user_feedback_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userFeedback->load('user');

        return view('frontend.userFeedbacks.show', compact('userFeedback'));
    }

    public function destroy(UserFeedback $userFeedback)
    {
        abort_if(Gate::denies('user_feedback_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userFeedback->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserFeedbackRequest $request)
    {
        UserFeedback::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
