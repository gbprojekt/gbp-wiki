@extends('layouts.app')

@section('content')

    <div class="flex flex-row mx-5 my-3">
        <div class="basis-full">
            <div class="card">
                <div class="card-header">
                    Willkommen im IT-Bereich &#128512;
                </div>
                <div class="card-body">
                    In diesem Bereich habe ich schon etwas mehr Erfahrung als im Finanz-Sektor,<br />
                    deswegen sind die hier zusammengetragenen Informationen eigentlich zu 99% basierend auf meiner Erfahrung.
                    <br />
                    <br />
                    Sprich ich habe alles, was ich hier so von mir geben, in irgendeinem Unternehmen so umgesetzt. &#128519;
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-row mx-5 my-3">
        <div class="basis-1/4 mx-2">
            <a href="{{ route('itActiveDirectory') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        MS Active Directory
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_msad.png') }}" />
                    </div>
                </div>
            </a>
        </div>
        <div class="basis-1/4 mx-2">
            <a href="{{ route('itEndpointManager') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        MS Endpoint Manager
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_msem.png') }}" />
                    </div>
                </div>
            </a>
        </div>
        <div class="basis-1/4 mx-2">
            <a href="{{ route('itNetworking') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        Netzwerk
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_network.jpg') }}" />
                    </div>
                </div>
            </a>
        </div>
        <div class="basis-1/4 mx-2">
            <a href="{{ route('itDataInterfaces') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        Data Interfaces
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_datainterface.png') }}" />
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="flex flex-row mx-5 my-3">
        <div class="basis-1/4 mx-2">
            <a href="{{ route('itDataWarehouse') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        Data Warehouse
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_datawarehouse.jpg') }}" />
                    </div>
                </div>
            </a>
        </div>
        <div class="basis-1/4 mx-2">
            <a href="{{ route('itDevelopment') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        Development
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_development.png') }}" />
                    </div>
                </div>
            </a>
        </div>
        <div class="basis-1/4 mx-2">
        </div>
        <div class="basis-1/4 mx-2">
        </div>
    </div>

@endsection
