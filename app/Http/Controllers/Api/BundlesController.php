<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bundle;

class BundlesController extends Controller
{
    public function index(){
        $bundles = Bundle::all();
        return response()->json(['data' => $bundles], 200);
    }
}
