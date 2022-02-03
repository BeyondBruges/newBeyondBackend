<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Analytic;

class AnalyticController extends Controller
{
    public function store(Request $resquest)
    {
        $analytic = new Analytic;
        $analytic->name =$resquest->user_id;
        $analytic->value =$resquest->value;
        $analytic->type_id =$resquest->type_id;
        $analytic-> save();

        return response()->json(['data' => $analytic], 200);
    
    }
}
