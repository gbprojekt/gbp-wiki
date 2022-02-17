@extends('layouts.app')

@section('content')

    <div class="flex flex-row mx-5 my-3">
        <div class="basis-full">
            <div class="card">
                <div class="card-header">
                    Willkommen im Finanz-Bereich &#128512;
                </div>
                <div class="card-body">
                    Hier findet Ihr alle möglichen Information, welche ich zusammengetragen habe.<br />
                    Wobei ich auch in manchen Bereichen schon selbst Erfahrungen gesammelt habe.
                    <br />
                    <br />
                    Bis dato habe ich mich vorwiegend im Bereich "Aktien" , "ETF" und "Kryptos" bewegt, &#129297;<br/>
                    wobei ich auch nebenbei mal die Bereiche "P2P-Kredite" und "Crowd-Funding" probiert habe.
                    <br />
                    <br />
                    Meine Erfahrungen werde ich in farblichen Boxen hervorheben und kursiv schreiben,<br />
                    damit Ihr diese einfach unterscheiden könnt. &#128521;
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-row mx-5 my-3">
        <div class="basis-1/4 mx-2">
            <a href="{{ route('financeMoneyHistory') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        Entstehung des Geldes
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_entstehungdesgeldes.jpg') }}" />
                    </div>
                </div>
            </a>
        </div>
        <div class="basis-1/4 mx-2">
            <a href="{{ route('financeInDeflation') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        Inflation / Deflation
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_inflationdeflation.jpg') }}" />
                    </div>
                </div>
            </a>
        </div>
        <div class="basis-1/4 mx-2">
            <a href="{{ route('financeAssetTypes') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        Anlagearten
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_anlagearten.jpg') }}" />
                    </div>
                </div>
            </a>
        </div>
        <div class="basis-1/4 mx-2">
            <a href="{{ route('financeAccountTypes') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        Kontenpläne
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_kontenplan.png') }}" />
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="flex flew-row mx-5 my-3">
        <div class="basis-1/4 mx-2">
            <a href="{{ route('financeSavings') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        Sparplan
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_sparplan.jpg') }}" />
                    </div>
                </div>
            </a>
        </div>
        <div class="basis-1/4 mx-2">
            <a href="{{ route('financeShare') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        Aktien
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_aktien.jpg') }}" />
                    </div>
                </div>
            </a>
        </div>
        <div class="basis-1/4 mx-2">
            <a href="{{ route('financeETF') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        ETF
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_etf.jpg') }}" />
                    </div>
                </div>
            </a>
        </div>
        <div class="basis-1/4 mx-2">
            <a href="{{ route('financeKrypto') }}">
                <div class="card hover:text-center hover:font-bold hover:text-black">
                    <div class="card-header">
                        Kryptos
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/subcat_menu/subcat_kryptos.jpg') }}" />
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection
