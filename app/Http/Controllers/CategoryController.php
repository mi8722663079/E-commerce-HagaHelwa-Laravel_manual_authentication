<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function form(){
        return view("admin.addCategory");
    }
    public function add(Request $request){
        $cat = $request->validate([
            "name" => "required|string|min:5|max:100"
        ]);
        $valid = Category::select()->where("name", "=", $request->name)->first();
        if($valid){
            return redirect()->route("cat.form")->withErrors("Category already exists");
        }
        Category::create($cat);
            return redirect()->route("cat.form")->with("success","Category added!");
    }
}
