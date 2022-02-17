<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;

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

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

/*
|       Main Navigation
*/

Route::get('/financeArea',[ViewController::class,'financeArea'])->name('userview.financeArea')->middleware('permissionOrGroup:money|admin');
Route::get('/itArea',[ViewController::class,'itArea'])->name('userview.itArea')->middleware('permissionOrGroup:it|admin');
Route::get('/businessArea',[ViewController::class,'businessArea'])->name('userview.businessArea')->middleware('permissionOrGroup:business|admin');

/*
|       Finance Routes
*/

Route::get('/financeMoneyHistory',[ViewController::class,'financeMoneyHistory'])->name('userview.financeMoneyHistory')->middleware('permissionOrGroup:money|admin');
Route::get('/financeInDeflation',[ViewController::class,'financeInDeflation'])->name('userview.financeInDeflation')->middleware('permissionOrGroup:money|admin');
Route::get('/financeAssetTypes',[ViewController::class,'financeAssetTypes'])->name('userview.financeAssetTypes')->middleware('permissionOrGroup:money|admin');
Route::get('/financeAccountTypes',[ViewController::class,'financeAccountTypes'])->name('userview.financeAccountTypes')->middleware('permissionOrGroup:money|admin');
Route::get('/financeSavings',[ViewController::class,'financeSavings'])->name('userview.financeSavings')->middleware('permissionOrGroup:money|admin');
Route::get('/financeETF',[ViewController::class,'financeETF'])->name('userview.financeETF')->middleware('permissionOrGroup:money|admin');
Route::get('/financeKrypto',[ViewController::class,'financeKrypto'])->name('userview.financeKrypto')->middleware('permissionOrGroup:money|admin');
Route::get('/financeShare',[ViewController::class,'financeShare'])->name('userview.financeShare')->middleware('permissionOrGroup:money|admin');

/*
|       IT Routes
*/

Route::get('/itActiveDirectory',[ViewController::class,'itActiveDirectory'])->name('userview.itActiveDirectory')->middleware('permissionOrGroup:it|admin');
Route::get('/itEndpointManager',[ViewController::class,'itEndpointManager'])->name('userview.itEndpointManager')->middleware('permissionOrGroup:it|admin');
Route::get('/itNetworking',[ViewController::class,'itNetworking'])->name('userview.itNetworking')->middleware('permissionOrGroup:it|admin');
Route::get('/itAppManagement',[ViewController::class,'itAppManagement'])->name('userview.itAppManagement')->middleware('permissionOrGroup:it|admin');
Route::get('/itDataInterfaces',[ViewController::class,'itDataInterfaces'])->name('userview.itDataInterfaces')->middleware('permissionOrGroup:it|admin');
Route::get('/itDataWarehouse',[ViewController::class,'itDataWarehouse'])->name('userview.itDataWarehouse')->middleware('permissionOrGroup:it|admin');
Route::get('/itDevelopment',[ViewController::class,'itDevelopment'])->name('userview.itDevelopment')->middleware('permissionOrGroup:it|admin');

/*
|       Business Routes
*/

Route::get('/businessSupplyChain',[ViewController::class,'businessSupplyChain'])->name('userview.businessSupplyChain')->middleware('permissionOrGroup:business|admin');
Route::get('/businessERPSystems',[ViewController::class,'businessERPSystems'])->name('userview.businessERPSystems')->middleware('permissionOrGroup:business|admin');
Route::get('/businessWMSSystems',[ViewController::class,'businessWMSSystems'])->name('userview.businessWMSSystems')->middleware('permissionOrGroup:business|admin');
Route::get('/businessCRMSystems',[ViewController::class,'businessCRMSystems'])->name('userview.businessCRMSystems')->middleware('permissionOrGroup:business|admin');

