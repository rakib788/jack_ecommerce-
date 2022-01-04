<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\Auth\LoginController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'backend'], function(){
Route::group(['middleware' => 'guest'], function(){
	// Loginpage
Route::get('/',[LoginController::class, 'Showlogin'])->name('Login');
Route::post('/',[LoginController::class, 'loginProcces'])->name('login.procces');

});
Route::group(['middleware'=>'auth'],function(){
// logout
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

// Dashboard
Route:: get('dashboard', [DashboardController::class, 'showDashboard'])->name('admin.dashboard');
// Categories
Route::get('/Create_category',[CategoryController::class,'createCategory'])->name('create.category');
Route::post('/Post_category',[CategoryController::class,'postCategory'])->name('post.category');
Route::get('/Allview_category',[CategoryController::class, 'view_category'])->name('view.category');
Route::get('/delete_category/{id}',[CategoryController::class, 'delete'])->name('delete.category');
Route::get('view_category/{id}',[CategoryController::class, 'view'])->name('viewOne.category');
Route::get('edit_category/Categories{id}',[CategoryController::class, 'edit'])->name('edit.category');
Route::post('update/Categories{id}', [CategoryController::class, 'update'])->name('update.category');
// Sub_cat
Route::get('/Create_sub',[SubCategoryController::class,'create'])->name('sub_create');
Route::post('/store_sub',[SubCategoryController::class,'store'])->name('sub_store');
Route::get('/index_sub',[SubCategoryController::class,'index'])->name('sub_index');
Route::get('/sub_show/{id}',[SubCategoryController::class,'show'])->name('sub_show');
Route::get('sub_delete/{id}',[SubCategoryController::class,'destroy'])->name('sub_delete');
Route::get('sub_edit/{id}',[SubCategoryController::class,'edit'])->name('sub_edit');
Route::post('sub_update/{id}',[SubCategoryController::class,'update'])->name('sub_update');
// customers
Route:: get('/create.customer', [CustomerController::class, 'create'])->name('create_customer');
Route:: post('/store.customer', [CustomerController::class, 'store'])->name('store_customer');
Route:: get('/index.customer', [CustomerController::class, 'index'])->name('index_customer');
Route:: get('/delete.customer/{id}', [CustomerController::class, 'destroy'])->name('delete_customer');
Route:: get('/show.customer/{id}', [CustomerController::class, 'show'])->name('show_customer');
Route:: get('/edit.customer/{id}', [CustomerController::class, 'edit'])->name('edit_customer');
Route:: post('/update.customer/{id}', [CustomerController::class, 'update'])->name('update_customer');
});
});