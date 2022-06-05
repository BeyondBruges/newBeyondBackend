<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
      public function index()
    {
        $products=Product::where('status', 1)->where('stock', ">", 0)->get();
        return response()->json(['data'=>$products], 200);
    }
}
