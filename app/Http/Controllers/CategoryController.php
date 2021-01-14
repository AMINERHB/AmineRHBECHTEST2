<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function storeCategory(Request $request) {
        $category = new Category();
        $category->name = $request->name;
        $category->CategoryP = $request->CategoryP;
        $category->save();

        return $category;
    }

    public function getCategory(Request $request) {
        $categorys = Category::all();

        return $categorys;
    }
    
    public function deleteCategory(Request $request){
        $category = Category::find($request->id)->delete();
    }

    public  function editCategory(Request $request, $id){
        $category = Category::where('id',$id)->first();

        $category->name = $request->get('val_1');
        $category->CategoryP = $request->get('val_2');
        $category->save();

        return $category;
    }
}