<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserLevelObject;

class UserLevelObjectController extends Controller
{
    public function index(Request $request){

    $user = User::find($request->user_id);
    if (!$user) {
        return response()->json(['not found'], 404);
    }
    else
    {

    $level_objects = $user->userUserLevelObjects;
    return response()->json(['data' => $level_objects], 200);
    }

   }

    public function store(Request $request){

    $user = User::find($request->user_id);
    if (!$user) {
        return response()->json(['not found'], 404);
    }
    else
    {
    $level_object = new UserLevelObject;
    $level_object->level_object_id = $request->level_object_id;
    $level_object->user_id = $user->id;
    $level_object->save();
    return response()->json(['data' => $level_object], 200);
    }

   }
}
