<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserViewController;
use App\Models\Subcategory;

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
    return view('auth.login');
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

Route::get('/subcategoriesAdminIndex',[SubcategoryController::class,'subcategoriesAdminIndex'])->name('subcategories.adminindex')->middleware('permissionOrGroup:admin');
Route::get('/subcategoriesAdminCreate',[SubcategoryController::class,'subcategoriesAdminCreate'])->name('subcategories.admincreate')->middleware('permissionOrGroup:admin');
Route::post('/subcategoriesAdminCreate',[SubcategoryController::class,'subcategoriesAdminStore'])->name('subcategories.adminstore')->middleware('permissionOrGroup:admin');
Route::get('/subcategoriesAdminEdit/{id}',[SubcategoryController::class,'subcategoriesAdminEdit'])->name('subcategories.adminedit')->middleware('permissionOrGroup:admin');
Route::post('/subcategoriesAdminEdit',[SubcategoryController::class,'subcategoriesAdminUpdate'])->name('subcategories.adminupdate')->middleware('permissionOrGroup:admin');
Route::get('/subcategoriesAdminDestroy/{id}',[SubcategoryController::class,'subcategoriesAdminDestroy'])->name('subcategories.admindestroy')->middleware('permissionOrGroup:admin');

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

Route::get('/userMoneyIndex',[UserViewController::class,'userViewIndex'])->name('userview.moneyindex')->middleware('permissionOrGroup:money|admin');
Route::get('/userItIndex',[UserViewController::class,'userViewIndex'])->name('userview.itindex')->middleware('permissionOrGroup:it|admin');
Route::get('/userBusinessIndex',[UserViewController::class,'userViewIndex'])->name('userview.businessindex')->middleware('permissionOrGroup:business|admin');

Route::get('/entstehunggeld',[UserViewController::class,'userViewPosts'])->name('userview.entstehunggeld')->middleware('permissionOrGroup:money|admin');
Route::get('/inflationdeflation',[UserViewController::class,'userViewPosts'])->name('userview.inflationdeflation')->middleware('permissionOrGroup:money|admin');
Route::get('/assetarten',[UserViewController::class,'userViewPosts'])->name('userview.assetarten')->middleware('permissionOrGroup:money|admin');
Route::get('/kostenplaene',[UserViewController::class,'userViewPosts'])->name('userview.kostenplaene')->middleware('permissionOrGroup:money|admin');
Route::get('/sparplaene',[UserViewController::class,'userViewPosts'])->name('userview.sparplaene')->middleware('permissionOrGroup:money|admin');
Route::get('/etf',[UserViewController::class,'userViewPosts'])->name('userview.etf')->middleware('permissionOrGroup:money|admin');
Route::get('/kryptos',[UserViewController::class,'userViewPosts'])->name('userview.kryptos')->middleware('permissionOrGroup:money|admin');
Route::get('/aktien',[UserViewController::class,'userViewPosts'])->name('userview.aktien')->middleware('permissionOrGroup:money|admin');

