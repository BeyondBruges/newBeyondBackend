<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LevelObject;

class LevelObjectsController extends Controller
{
    public function index()
    {
        $levelObjects=LevelObject::all();
        return response()->json(['data'=>$levelObjects], 200);
    }
}
