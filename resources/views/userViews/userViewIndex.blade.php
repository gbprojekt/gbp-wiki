@extends('layouts.app')

@section('content')
    @if($subcategories != null)
        <div class="container">
            <div class="row">
                @foreach($subcategories as $subcategory)
                    <div class="col-3 px-2 py-4">
                        <a href="{{ $subcategory->route }}">
                            <div class="card" style="width: 14rem;">
                                <img class="card-img-top" src="{{ asset('img/' . $subcategory->image) }}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text text-center">{{ $subcategory->name }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
