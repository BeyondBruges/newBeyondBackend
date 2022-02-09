<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Analytic;

class AnalyticController extends Controller
{
    public function store(Request $request)
    {

        $analytic = new Analytic;
        $analytic->name =$request->user_id;
        $analytic->value =$request->value;
        $analytic->type_id =$request->type_id;
        $analytic-> save();

        return response()->json(['data' => $analytic], 200);
    
    }
}
