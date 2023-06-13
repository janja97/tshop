<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\BuyController;



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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class, 'index']);
Route::get('category',[FrontendController::class, 'category']);
Route::get('view-category/{slug}',[FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class, 'productview']);
Route::get('view-product/{prod_slug}',[FrontendController::class, 'prodview']);
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');




// Route::post('add_to_cart', [CartController::class,'addToCart']);


Auth::routes();

Route::post('add_to_cart', [CartController::class,'addToCart']);

Route::middleware(['auth'])->group(function(){
    // Route::post('add-to-cart',[CartController::class,'addProduct']);
    // Route::post('add_to_cart', [CartController::class,'addToCart']);
    Route::get('cart', [CartController::class,'viewcart']);
    Route::get('delete/{id}',[CartController::class, 'update']);



});
Route::middleware( ['auth','isAdmin'])->group(function (){
    // Route::get('/admin/dashboard', [FrontendController::class, 'index']);
    Route::get('dashboard', 'App\Http\Controllers\Admin\FrontendController@index');
    Route::get('categories', 'App\Http\Controllers\Admin\CategoryController@index');
    Route::get('add-category', 'App\Http\Controllers\Admin\CategoryController@add');

    Route::post('insert-category', 'App\Http\Controllers\Admin\CategoryController@insert');

    Route::get('edit-prod/{id}',[CategoryController::class,'edit']);
    Route::put('update-category/{id}', [CategoryController::class,'update']);
    Route::get('delete-category/{id}',[CategoryController::class,'destroy']);
    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products',[ProductController::class, 'add']);
    Route::post('insert-product', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}',[ProductController::class, 'edit']);
    Route::put('update-product/{id}',[ProductController::class, 'update']);
    Route::get('delete-product/{id}',[ProductController::class, 'destroy']);
});

