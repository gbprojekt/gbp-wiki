<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{

    /*
    |       Main Navigation
    */

    public function financeArea()           { return view('userViews.financeArea'); }
    public function itArea()                { return view('userViews.itArea'); }
    public function businessArea()          { return view('userViews.businessArea'); }

    /*
    |       Sub Navigation
    */

    public function financeMoneyHistory()   { return view('userViewsFinance.financeMoneyHistory'); }
    public function financeInDeflation()    { return view('userViewsFinance.financeInDeflation'); }
    public function financeAssetTypes()     { return view('userViewsFinance.financeAssetTypes'); }
    public function financeAccountTypes()   { return view('userViewsFinance.financeAccountTypes'); }
    public function financeSavings()        { return view('userViewsFinance.financeSavings'); }
    public function financeShare()          { return view('userViewsFinance.financeShare'); }

            public function financeShareCreation()                  { return view('userViewsFinance.financeShareCreation'); }
            public function financeShareDerivate()                  { return view('userViewsFinance.financeShareDerivate'); }

                    public function financeShareDerivateOptions()               { return view('userViewsFinance.financeShareDerivateOptions'); }
                    public function financeShareDerivateFutures()               { return view('userViewsFinance.financeShareDerivateFutures'); }
                    public function financeShareDerivateLever()                 { return view('userViewsFinance.financeShareDerivateLever'); }

    public function financeETF()            { return view('userViewsFinance.financeETF'); }

            public function financeETFCreation()                    { return view('userViewsFinance.financeETFCreation'); }
            public function financeETFCosts()                       { return view('userViewsFinance.financeETFCosts'); }
            public function financeETFBuyPlan()                     { return view('userViewsFinance.financeETFBuyPlan'); }
            public function financeETFRecommendation()              { return view('userViewsFinance.financeETFRecommendation'); }

    public function financeKrypto()         { return view('userViewsFinance.financeKrypto'); }

            public function financeKryptoVocabulary()               { return view('userViewsFinance.financeKryptoVocabulary'); }
            public function financeKryptoIntro()                    { return view('userViewsFinance.financeKryptoIntro'); }
            public function financeKryptoCoinTokenNFT()             { return view('userViewsFinance.financeKryptoCoinTokenNFT'); }
            public function financeKryptoWallets()                  { return view('userViewsFinance.financeKryptoWallets'); }
            public function financeKryptoProjects()                 { return view('userViewsFinance.financeKryptoProjects'); }

    public function financeMarketPlaces()   { return view('userViewsFinance.financeMarketPlaces'); }
    public function financeMSCIFTSE()       { return view('userViewsFinance.financeMSCIFTSE'); }
    public function financeBroker()         { return view('userViewsFinance.financeBroker'); }

    public function itActiveDirectory()     { return view('userViewsIT.itActiveDirectory'); }
    public function itEndpointManager()     { return view('userViewsIT.itEndpointManager'); }
    public function itNetworking()          { return view('userViewsIT.itNetworking'); }
    public function itDataInterfaces()      { return view('userViewsIT.itDataInterfaces'); }

            public function itDataInterfacesAPI()                   { return view('userViewsIT.itDataInterfacesAPI'); }
            public function itDataInterfacesEDI()                   { return view('userViewsIT.itDataInterfacesEDI'); }

    public function itDataWarehouse()       { return view('userViewsIT.itDataWarehouse'); }

            public function itDataWarehouseSourceData()             { return view('userViewsIT.itDataWarehouseSourceData'); }
            public function itDataWarehouseETL()                    { return view('userViewsIT.itDataWarehouseETL'); }
            public function itDataWarehouseTargetData()             { return view('userViewsIT.itDataWarehouseTargetData'); }

    public function itDevelopment()         { return view('userViewsIT.itDevelopment'); }

            public function itDevelopmentCodingOrProgramming()      { return view('userViewsIT.itDevelopmentCodingOrProgramming'); }
            public function itDevelopmentClassObjectInstanz()       { return view('userViewsIT.itDevelopmentClassObjectInstanz'); }
            public function itDevelopmentMVC()                      { return view('userViewsIT.itDevelopmentMVC'); }
            public function itDevelopmentCRUD()                     { return view('userViewsIT.itDevelopmentCRUD'); }
            public function itDevelopmentFramework()                { return view('userViewsIT.itDevelopmentFramework'); }
            public function itDevelopmentCMS()                      { return view('userViewsIT.itDevelopmentCMS'); }

    public function businessSupplyChain()   { return view('userViewsBusiness.businessSupplyChain'); }
    public function businessERPSystems()    { return view('userViewsBusiness.businessERPSystems'); }
    public function businessWMSSystems()    { return view('userViewsBusiness.businessWMSSystems'); }
    public function businessCRMSystems()    { return view('userViewsBusiness.businessCRMSystems'); }

    public function aboutme()               { return view('userViews.aboutme'); }
}

