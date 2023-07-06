<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PostsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function(){
     return response()->json([
        'name'=>'Dary',
        'Course'=>'Laravel'
     ]);
});

Route::get('/users', function(){
       return redirect('/');
});

Route::get('/home', function(){
    return view('home');
});
*/
//Route::get('products', 'App\Http\Controllers\ProductsController@index' );

//Route::get('/products', [ProductsController::class, 'index']);

//Route::get('products/about', [ProductsController::class, 'about'] );

//Route::get('products/{name}', [ProductsController::class, 'show']);
/*
Route::get('products/{name}/{id}', 
   [ProductsController::class, 'show'])->where(
    [
        'name'=>'[a-z]+',
        'id'=>'[1-9]+'
    ]
   );

Route::get('/products', 
            [ProductsController::class, 'index'])->name('products');
            */
Route::get('/',[PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/blade',[PagesController::class, 'blade']);
Route::get('/posts',[PostsController::class, 'index']);