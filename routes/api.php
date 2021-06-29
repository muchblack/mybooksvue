<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BooksController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PublisherController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('api')->group(function (){
    //獨立新增路由
    Route::get('category/parent/',[CategoryController::class,'getParentCategory']);
    Route::get('category/parent/{id}',[CategoryController::class,'getChildrenCategory']);

    //對應的Resource路由要在最下方解析
    Route::resource('books',BooksController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('publisher',PublisherController::class);

});
