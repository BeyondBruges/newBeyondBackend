<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners=Partner::with('partnerPartnerDescriptions')->orderByDesc("name")->get();
        return response()->json(['data'=>$partners], 200);
    }
}
