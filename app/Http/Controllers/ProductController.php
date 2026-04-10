<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
// Dashboard
    // show all 
    public function adminAll(){
        $prods = Product::all();
        return view("admin.allProducts",compact("prods"));
    }
    // product form for creation
    public function form(){
        $cats = Category::all();
        return view("admin.formProduct",compact("cats"));
    }
    // product create logic
    public function add(Request $request){
        $data = $request->validate([
            "name" => "bail|required|string|min:5|max:100",
            "description" => "nullable|string|min:10",
            "quantity" => "bail|required|integer|min:1",
            "price" => "bail|required|numeric|min:0",
            "img"=> "bail|required|image|mimes:png,jpg,jpeg",
            "category_id" => "bail|required|exists:categories,id"
        ],[
            "category_id.required" => "please select a Category for the product",
            "category_id.exists" => "No valid Category was selected."
        ]);
        $data["img"] = Storage::putFile("product",$request->img);
        Product::create($data);
        return redirect()->route("prod.index")->with("success","Product added successfully!");
    }
    // product edit form for editting
    public function editForm($id){
        $cats = Category::all();
        $product = Product::findOrFail($id);
        return view("admin.editProduct",compact(["cats","product"]));
    }
    // product edit logic
    public function edit($id,Request $request){
        $data = $request->validate([
            "name" => "bail|required|string|min:5|max:100",
            "description" => "nullable|string|min:10",
            "quantity" => "bail|required|integer|min:1",
            "price" => "bail|required|numeric|min:0",
            "img"=> "image|mimes:png,jpg,jpeg",
            "category_id" => "bail|required|exists:categories,id"
        ],[
            "category_id.required" => "please select a Category for the product",
            "category_id.exists" => "No valid Category was selected."
        ]);
        $product = Product::findOrFail($id);
        if($request->has("img")){
            Storage::delete($product->img);
            $data["img"] = Storage::putFile("product",$request->img);
        }else{
            $data["img"] = $product->img;
        }
        $product->update($data);
        return redirect()->route("prod.index")->with("success","Product edited successfully!");
    }
    // product delete logic
    public function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route("prod.index")->with("success","Product deleted successfully!");
    }
// User side
    // home page product show
    public function userAll(){
        $prods = Product::all();
        return view("user.index",compact("prods"));
    }
    // shop page
    public function shopAll(){
        $prods = Product::paginate(4);
        return view("user.shop",compact("prods"));
    }
}