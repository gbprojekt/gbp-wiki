<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserViewController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::resource('permissions','\App\Http\Controllers\PermissionController')->middleware('permissionOrGroup:admin');
Route::resource('groups','\App\Http\Controllers\GroupController')->middleware('permissionOrGroup:admin');
Route::resource('users','\App\Http\Controllers\UserController')->middleware('permissionOrGroup:admin');

Route::get('/categoriesAdminIndex',[CategoryController::class,'categoriesAdminIndex'])->name('categories.adminindex')->middleware('permissionOrGroup:admin');
Route::get('/categoriesAdminCreate',[CategoryController::class,'categoriesAdminCreate'])->name('categories.admincreate')->middleware('permissionOrGroup:admin');
Route::post('/categoriesAdminCreate',[CategoryController::class,'categoriesAdminStore'])->name('categories.adminstore')->middleware('permissionOrGroup:admin');
Route::get('/categoriesAdminEdit/{id}',[CategoryController::class,'categoriesAdminEdit'])->name('categories.adminedit')->middleware('permissionOrGroup:admin');
Route::post('/categoriesAdminEdit',[CategoryController::class,'categoriesAdminUpdate'])->name('categories.adminupdate')->middleware('permissionOrGroup:admin');
Route::get('/categoriesAdminDestroy/{id}',[CategoryController::class,'categoriesAdminDestroy'])->name('categories.admindestroy')->middleware('permissionOrGroup:admin');

Route::get('/postsAdminIndex',[PostController::class,'postsAdminIndex'])->name('posts.adminindex')->middleware('permissionOrGroup:admin');
Route::get('/postsAdminCreate',[PostController::class,'postsAdminCreate'])->name('posts.admincreate')->middleware('permissionOrGroup:admin');
Route::post('/postsAdminCreate',[PostController::class,'postsAdminStore'])->name('posts.adminstore')->middleware('permissionOrGroup:admin');
Route::get('/postsAdminEdit/{id}',[PostController::class,'postsAdminEdit'])->name('posts.adminedit')->middleware('permissionOrGroup:admin');
Route::post('/postsAdminEdit',[PostController::class,'postsAdminUpdate'])->name('posts.adminupdate')->middleware('permissionOrGroup:admin');
Route::get('/postsAdminDestroy/{id}',[PostController::class,'postsAdminDestroy'])->name('posts.admindestroy')->middleware('permissionOrGroup:admin');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::get('/userMoneyIndex',[UserViewController::class,'userViewPosts'])->name('userview.moneyindex')->middleware('permissionOrGroup:money|admin');
Route::get('/userItIndex',[UserViewController::class,'userViewPosts'])->name('userview.itindex')->middleware('permissionOrGroup:it|admin');
Route::get('/userBusinessIndex',[UserViewController::class,'userViewPosts'])->name('userview.businessindex')->middleware('permissionOrGroup:business|admin');
