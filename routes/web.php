<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;

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
Route::get('/', [FrontendController::class, 'index']);
Route::get('category', [FrontendController::class, 'category']);
Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);
Route::get('product-list', [FrontendController::class, 'productlistAjax']);
Route::get('searchproduct', [FrontendController::class, 'searchProduct']);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('cart/count',[CartController::class,'cartcount']);
Route::get('load-wishlist-count',[WishlistController::class, 'wishlistcount']);


Route::post('add-to-cart',[CartController::class, 'addproduct']);
Route::post('delete-cart-item',[CartController::class, 'deleteproduct']);
Route::post('update-cart',[CartController::class, 'updatecart']);

Route::post('add-to-wishlist', [WishlistController::class, 'add']);
Route::post('delete-wishlist-item', [WishlistController::class, 'deleteitem']);

Route::middleware('auth')->group(function (){
    Route::get('cart',[CartController::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeorder']);
    Route::get('my-order',[UserController::class, 'index']);
    Route::get('/view-order/{id}',[UserController::class, 'view']);

    Route::post('add-rating',[RatingController::class, 'add']);

    Route::get('/add-review/{products->slug}/userreview',[ReviewController::class, 'add']);
    Route::post('/add-review',[ReviewController::class, 'create']);
    Route::get('/edit-review/{products->slug}/userreview',[ReviewController::class, 'edit']);

    Route::get('wishlist', [WishlistController::class, 'index']);

    Route::post('proceed-to-pay', [CheckoutController::class, 'razorpaycheck']);

});


Route::middleware('auth','isAdmin')->group(function (){
    Route::get('/dashboard','Admin\FrontendController@index');

    Route::get('categories','Admin\CategoryController@index');
    Route::get('add-category','Admin\CategoryController@add');
    Route::post('insert-category','Admin\CategoryController@insert');
    Route::get('edit-category/{id}',[CategoryController::class, 'edit']);
    Route::put('/update-category/{id}',[CategoryController::class, 'update']);
    Route::get('delete-category/{id}',[CategoryController::class, 'destroy']);

    Route::get('products',[ProductController::class, 'index']);
    Route::get('add-products',[ProductController::class, 'add']);
    Route::post('insert-Product',[ProductController::class, 'insert']);
    Route::get('edit-Product/{id}',[ProductController::class, 'edit']);
    Route::put('update-Product/{id}',[ProductController::class, 'update']);
    Route::get('delete-Product/{id}',[ProductController::class, 'destroy']);

    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::Put('update-order/{id}', [OrderController::class, 'updateorder']);
    Route::get('order-history', [OrderController::class, 'orderhistory']);

    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-users/{id}', [DashboardController::class, 'viewusers']);

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

