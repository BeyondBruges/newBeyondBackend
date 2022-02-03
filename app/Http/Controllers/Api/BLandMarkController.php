<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BLandMark;

class BLandMarkController extends Controller
{
    public function index(){

        $bLandMarks = BLandMark::all();
        return response()->json(['data' => $bLandMarks], 200);
    }
}
