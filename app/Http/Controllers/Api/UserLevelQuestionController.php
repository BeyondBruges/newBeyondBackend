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
        $question = UserLevelQuestion::where('user_id', $user->id)->where("question_id", $request->question_id)->first();
        if(!$question){
            $level_question= new UserLevelQuestion;
            $level_question->question_id = $request->question_id;
            $level_question->result = $request->result; //1 bien, 0 mal
            $level_question->user_id = $user->id;
            $level_question->save();

            if($user->timeleft > 0){
                $user->timeleft -= 1;
                $user->update();
            }

            return response()->json(['data' => $level_question], 200);
        }
        else{
            return response()->json(['UserLeveQuestion Exists'], 404);
        }
    }
   }

   public function delete(Request $request){

        $user = Auth::user();

        if (!$user) {
            return response()->json(['not found'], 404);
        }   
        else
        {
            $user->timeleft = 12;
            if ($user->userUserLevelQuestions->count() > 0) 
            {
                foreach($user->userUserLevelQuestions as $object)
                {
                    $object->delete();
                }
            }
            $user->update();
            return response()->json(['UserLevelQuestions were deleted'], 200);
        }
    }
}
