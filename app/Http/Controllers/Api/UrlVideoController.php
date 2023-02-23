<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UrlVideo;

class UrlVideoController extends Controller
{
    public function index(){
        $videos = UrlVideo::all();
        return response()->json(['data' => $videos], 200);
    }
}
