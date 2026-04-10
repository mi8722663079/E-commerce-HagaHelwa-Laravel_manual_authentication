<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
// user side pages
Route::get('/',[ProductController::class,"userAll"])->name("index");
Route::get('shop',[ProductController::class,"shopAll"]);

// authentication pages

Route::controller(AuthController::class)->group(function(){
    // register
    Route::get("signup","register")->name("auth.reg")->middleware("guest");
    Route::post("signup","assert")->name("auth.assert");
    // login
    Route::get("login","logForm")->name("login")->middleware("guest");
    Route::post("login","log")->name("auth.log");
    Route::get("admin",function(){
        return view("admin.home");
    })->name("admin")->middleware("auth");
    // log out
    Route::post("logout","exit")->name("auth.logout")->middleware("auth");
});

Route::controller(CategoryController::class)->group(function(){
    Route::post("admin/cat","add")->name("cat.add")->middleware("auth");
    Route::get("admin/cat","form")->name("cat.form")->middleware("auth");
});
Route::controller(ProductController::class)->group(function(){
//Dashboard 
    // create
    Route::get("admin/product/addform","form")->name("prod.addForm")->middleware("auth");
    Route::post("admin/product/add","add")->name("prod.add");
    // show all
    Route::get("admin/product/all","adminAll")->name("prod.index")->middleware("auth");
    // edit
    Route::get("admin/product/editform/{id}","editForm")->name("prod.editForm")->middleware("auth");
    Route::post("admin/product/edit/{id}","edit")->name("prod.edit");
    // delete
    Route::delete("admin/product/delete/{id}","delete")->name("prod.delete");
// User side
    Route::get("user/product/all","adminAll")->name("prod.index")->middleware("auth");

});
Route::get('{page}', function ($page) {
    if (view()->exists("user.$page")) {
        return view("user.$page");
    }elseif(view()->exists("admin.$page")){
        return view("admin.$page");
    }

    // abort(404);
});
