<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = ProductCategories::all();
        return view('admin.category.index')->with(compact('categories'));
    }

    public function delete($id){
        $categories = ProductCategories::find($id);
        $categories->delete();
        return redirect()->back();
    }
}
