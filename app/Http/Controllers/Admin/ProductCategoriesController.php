<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoriesController extends Controller
{
    public function index(){

        $productCategories = ProductCategory::all();
        return view('admin.productCategories.index', compact('productCategories'));
    }

    public function create(){
        return view('admin.productCategories.create');

    }

     public function store(Request $request)
    {

        $category = ProductCategory::where('name', $request->name)->first();
        if (!$category) {
               $productCategory = ProductCategory::create($request->all());
        return redirect()->route('admin.product-categories.index');
        }
        else
        {
            return redirect()->route('admin.product-categories.index');
        }

    }

    public function edit($id){

        $productCategory = ProductCategory::find($id);

        if (!$productCategory) 
        {
        return view('admin.productCategories.index');
        }
        else
        {
        return view('admin.productCategories.edit', compact('productCategory'));
        }

    }

    public function update($id, Request $request){

         $productCategory = ProductCategory::find($id);

        if (!$productCategory) 
        {
        return view('admin.productCategories.index');
        }
        else
        {
            $productCategory->name = $request->name;
            $productCategory->update();
        return redirect()->route('admin.product-categories.index');
        }
    }


    public function show ($id){
        return $id;
    }

    public function destroy ($id)
    {
        $productCategory = ProductCategory::find($id);


        if ($productCategory->products()->count() == 0) {
            $productCategory->delete();
            return redirect()->back()->with('success', 'Category Deleted successfully');
        }
        else
        {
            return redirect()->back()->with('danger', 'Cannot delete categories with assigned products. Please reassing products first');
        }
    }
}
