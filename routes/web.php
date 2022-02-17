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
|       main nav routes
*/

Route::get('/financeArea',[ViewController::class,'financeArea'])->name('financeArea')->middleware('permissionOrGroup:money|admin');
Route::get('/itArea',[ViewController::class,'itArea'])->name('itArea')->middleware('permissionOrGroup:it|admin');
Route::get('/businessArea',[ViewController::class,'businessArea'])->name('businessArea')->middleware('permissionOrGroup:business|admin');





/*
|       finance routes
*/

Route::get('/financeMoneyHistory',[ViewController::class,'financeMoneyHistory'])->name('financeMoneyHistory')->middleware('permissionOrGroup:money|admin');
Route::get('/financeInDeflation',[ViewController::class,'financeInDeflation'])->name('financeInDeflation')->middleware('permissionOrGroup:money|admin');
Route::get('/financeAssetTypes',[ViewController::class,'financeAssetTypes'])->name('financeAssetTypes')->middleware('permissionOrGroup:money|admin');
Route::get('/financeAccountTypes',[ViewController::class,'financeAccountTypes'])->name('financeAccountTypes')->middleware('permissionOrGroup:money|admin');
Route::get('/financeSavings',[ViewController::class,'financeSavings'])->name('financeSavings')->middleware('permissionOrGroup:money|admin');

Route::get('/financeShare',[ViewController::class,'financeShare'])->name('financeShare')->middleware('permissionOrGroup:money|admin');

        Route::get('/financeShareCreation',[ViewController::class,'financeShareCreation'])->name('financeShareCreation')->middleware('permissionOrGroup:money|admin');
        Route::get('/financeShareDerivate',[ViewController::class,'financeShareDerivate'])->name('financeShareDerivate')->middleware('permissionOrGroup:money|admin');

                Route::get('/financeShareDerivateOptions',[ViewController::class,'financeShareDerivateOptions'])->name('financeShareDerivateOptions')->middleware('permissionOrGroup:money|admin');
                Route::get('/financeShareDerivateFutures',[ViewController::class,'financeShareDerivateFutures'])->name('financeShareDerivateFutures')->middleware('permissionOrGroup:money|admin');
                Route::get('/financeShareDerivateLever',[ViewController::class,'financeShareDerivateLever'])->name('financeShareDerivateLever')->middleware('permissionOrGroup:money|admin');

Route::get('/financeETF',[ViewController::class,'financeETF'])->name('financeETF')->middleware('permissionOrGroup:money|admin');

        Route::get('/financeETFCreation',[ViewController::class,'financeETFCreation'])->name('financeETFCreation')->middleware('permissionOrGroup:money|admin');
        Route::get('/financeETFCosts',[ViewController::class,'financeETF'])->name('financeETF')->middleware('permissionOrGroup:money|admin');
        Route::get('/financeETFBuyPlan',[ViewController::class,'financeETF'])->name('financeETF')->middleware('permissionOrGroup:money|admin');
        Route::get('/financeETFRecommendation',[ViewController::class,'financeETFRecommendation'])->name('financeETFRecommendation')->middleware('permissionOrGroup:money|admin');

Route::get('/financeKrypto',[ViewController::class,'financeKrypto'])->name('financeKrypto')->middleware('permissionOrGroup:money|admin');

        Route::get('/financeKryptoVocabulary',[ViewController::class,'financeKryptoVocabulary'])->name('financeKryptoVocabulary')->middleware('permissionOrGroup:money|admin');
        Route::get('/financeKryptoIntro',[ViewController::class,'financeKryptoIntro'])->name('financeKryptoIntro')->middleware('permissionOrGroup:money|admin');
        Route::get('/financeKryptoCoinTokenNFT',[ViewController::class,'financeKryptoCoinTokenNFT'])->name('financeKryptoCoinTokenNFT')->middleware('permissionOrGroup:money|admin');
        Route::get('/financeKryptoWallets',[ViewController::class,'financeKryptoWallets'])->name('financeKryptoWallets')->middleware('permissionOrGroup:money|admin');
        Route::get('/financeKryptoProjects',[ViewController::class,'financeKryptoProjects'])->name('financeKryptoProjects')->middleware('permissionOrGroup:money|admin');


/*
|       finance routes which are used in several different areas
*/

Route::get('/financeMarketPlaces',[ViewController::class,'financeMarketPlaces'])->name('financeMarketPlaces')->middleware('permissionOrGroup:money|admin');
Route::get('/financeMSCIFTSE',[ViewController::class,'financeMSCIFTSE'])->name('financeMSCIFTSE')->middleware('permissionOrGroup:money|admin');
Route::get('/financeBroker',[ViewController::class,'financeBroker'])->name('financeBroker')->middleware('permissionOrGroup:money|admin');





/*
|       IT routes
*/

Route::get('/itActiveDirectory',[ViewController::class,'itActiveDirectory'])->name('itActiveDirectory')->middleware('permissionOrGroup:it|admin');
Route::get('/itEndpointManager',[ViewController::class,'itEndpointManager'])->name('itEndpointManager')->middleware('permissionOrGroup:it|admin');
Route::get('/itNetworking',[ViewController::class,'itNetworking'])->name('itNetworking')->middleware('permissionOrGroup:it|admin');
Route::get('/itDataInterfaces',[ViewController::class,'itDataInterfaces'])->name('itDataInterfaces')->middleware('permissionOrGroup:it|admin');

        Route::get('/itDataInterfacesAPI',[ViewController::class,'itDataInterfaces'])->name('itDataInterfaces')->middleware('permissionOrGroup:it|admin');
        Route::get('/itDataInterfacesEDI',[ViewController::class,'itDataInterfaces'])->name('itDataInterfaces')->middleware('permissionOrGroup:it|admin');

Route::get('/itDataWarehouse',[ViewController::class,'itDataWarehouse'])->name('itDataWarehouse')->middleware('permissionOrGroup:it|admin');

        Route::get('/itDataWarehouseSourceData',[ViewController::class,'itDataWarehouseSourceData'])->name('itDataWarehouseSourceData')->middleware('permissionOrGroup:it|admin');
        Route::get('/itDataWarehouseETL',[ViewController::class,'itDataWarehouseETL'])->name('itDataWarehouseETL')->middleware('permissionOrGroup:it|admin');
        Route::get('/itDataWarehouseTargetData',[ViewController::class,'itDataWarehouseTargetData'])->name('itDataWarehouseTargetData')->middleware('permissionOrGroup:it|admin');

Route::get('/itDevelopment',[ViewController::class,'itDevelopment'])->name('itDevelopment')->middleware('permissionOrGroup:it|admin');

        Route::get('/itDevelopmentCodingOrProgramming',[ViewController::class,'itDevelopmentCodingOrProgramming'])->name('itDevelopmentCodingOrProgramming')->middleware('permissionOrGroup:it|admin');
        Route::get('/itDevelopmentClassObjectInstanz',[ViewController::class,'itDevelopmentClassObjectInstanz'])->name('itDevelopmentClassObjectInstanz')->middleware('permissionOrGroup:it|admin');
        Route::get('/itDevelopmentMVC',[ViewController::class,'itDevelopmentMVC'])->name('itDevelopmentMVC')->middleware('permissionOrGroup:it|admin');
        Route::get('/itDevelopmentCRUD',[ViewController::class,'itDevelopmentCRUD'])->name('itDevelopmentCRUD')->middleware('permissionOrGroup:it|admin');
        Route::get('/itDevelopmentFramework',[ViewController::class,'itDevelopmentFramework'])->name('itDevelopmentFramework')->middleware('permissionOrGroup:it|admin');
        Route::get('/itDevelopmentCMS',[ViewController::class,'itDevelopmentCMS'])->name('itDevelopmentCMS')->middleware('permissionOrGroup:it|admin');





/*
|       business routes
*/

Route::get('/businessSupplyChain',[ViewController::class,'businessSupplyChain'])->name('businessSupplyChain')->middleware('permissionOrGroup:business|admin');
Route::get('/businessERPSystems',[ViewController::class,'businessERPSystems'])->name('businessERPSystems')->middleware('permissionOrGroup:business|admin');
Route::get('/businessWMSSystems',[ViewController::class,'businessWMSSystems'])->name('businessWMSSystems')->middleware('permissionOrGroup:business|admin');
Route::get('/businessCRMSystems',[ViewController::class,'businessCRMSystems'])->name('businessCRMSystems')->middleware('permissionOrGroup:business|admin');





/*
|       other routes
*/

Route::get('/aboutme',[ViewController::class,'aboutme'])->name('aboutme')->middleware('permissionOrGroup:money|business|it|admin');
