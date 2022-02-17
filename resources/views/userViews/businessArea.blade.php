@extends('layouts.app')

@section('content')

    <div class="flex flex-row mx-5 my-3">
        <div class="basis-full">
            <div class="card">
                <div class="card-header">
                    Willkommen im Business-Bereich &#128512;
                </div>
                <div class="card-body">
                    Hier versuche ich alles, was ich die letzten Jahre (oder Jahrzehnte) an Erfahrungen gesammelt habe,<br />
                    in meinen Worten festzuhalten.
                    <br />
                    <br />
                    Vielleicht braucht das ja mal wer &#128540;
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-row mx-5 my-3">
        <div class="basis-1/4 mx-2">
            <a href="{{ route('businessSupplyChain') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        Supply Chain
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_suppychain.jpg') }}" />
                    </div>
                </div>
            </a>
        </div>
        <div class="basis-1/4 mx-2">
            <a href="{{ route('businessERPSystems') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        ERP System
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_erp.png') }}" />
                    </div>
                </div>
            </a>
        </div>
        <div class="basis-1/4 mx-2">
            <a href="{{ route('businessWMSSystems') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        WMS System
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_wms.jpg') }}" />
                    </div>
                </div>
            </a>
        </div>
        <div class="basis-1/4 mx-2">
            <a href="{{ route('businessCRMSystems') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        CRM System
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_crm.jpg') }}" />
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection
