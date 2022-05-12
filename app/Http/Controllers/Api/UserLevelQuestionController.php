<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserLevelQuestion;
use Auth;

class UserLevelQuestionController extends Controller
{
    public function index(Request $request){

    $user = Auth::user();
    if (!$user) {
        return response()->json(['not found'], 404);
    }
    else
    {

    $level_questions = $user->userUserLevelQuestions;
    return response()->json(['data' => $level_questions], 200);
    }

   }

    public function store(Request $request){

    $user = Auth::user();
    if (!$user) {
        return response()->json(['not found'], 404);
    }
    else
    {
    $level_object = new UserLevelQuestion;
    $level_object->question_id = $request->question_id;
    $level_object->user_id = $user->id;
    $level_object->save();
    return response()->json(['data' => $level_object], 200);
    }

   }
}
