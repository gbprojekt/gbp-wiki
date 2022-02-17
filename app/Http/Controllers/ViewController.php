<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{

    /*
    |       Main Navigation
    */

    public function financeArea()   { return view('userViews.financeArea'); }
    public function itArea()        { return view('userViews.itArea'); }
    public function businessArea()  { return view('userViews.businessArea'); }

    /*
    |       Sub Navigation
    */

    public function financeMoneyHistory()   { return view('userViews.financeMoneyHistory'); }
    public function financeInDeflation()    { return view('userViews.financeInDeflation'); }
    public function financeAssetTypes()     { return view('userViews.financeAssetTypes'); }
    public function financeAccountTypes()   { return view('userViews.financeAccountTypes'); }
    public function financeSavings()        { return view('userViews.financeSavings'); }
    public function financeETF()            { return view('userViews.financeETF'); }
    public function financeKrypto()         { return view('userViews.financeKrypto'); }
    public function financeShare()          { return view('userViews.financeShare'); }

    public function itActiveDirectory()     { return view('userViews.itActiveDirectory'); }
    public function itEndpointManager()     { return view('userViews.itEndpointManager'); }
    public function itNetworking()          { return view('userViews.itNetworking'); }
    public function itAppManagement()       { return view('userViews.itAppManagement'); }
    public function itDataInterfaces()      { return view('userViews.itDataInterfaces'); }
    public function itDataWarehouse()       { return view('userViews.itDataWarehouse'); }
    public function itDevelopment()         { return view('userViews.itDevelopment'); }

    public function businessSupplyChain()   { return view('userViews.businessSupplyChain'); }
    public function businessERPSystems()    { return view('userViews.businessERPSystems'); }
    public function businessWMSSystems()    { return view('userViews.businessWMSSystems'); }
    public function businessCRMSystems()    { return view('userViews.businessCRMSystems'); }
}

