<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    public function index(){

        $levels = Level::all();
        return response()->json(['data' => $levels], 200);
    }
}
