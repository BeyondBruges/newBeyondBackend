<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
      public function index()
    {
        $products=Product::all();
        return response()->json(['data'=>$products], 200);
    }
}
