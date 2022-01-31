<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
        $posts = Blog::all();
        return response()->json(['data' => $posts], 200);
    }
}
