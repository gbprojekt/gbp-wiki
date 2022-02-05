@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-10 offset-col-1 mb-4">
            <nav>
                <a href="{{ route('subcategories.admincreate') }}">Neue Subkategorie erstellen</a>
            </nav>
        </div>
        @if(Session::has('success'))
            <div class="row">
                <div class="col-10 offset-col-1">
                    <div class="alert alert-success">
                        <p>{{Session::get('success')}}</p>
                    </div>
                </div>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="row">
                <div class="col-10 offset-col-1">
                    <div class="alert alert-danger">
                        <p>{{Session::get('error')}}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-10 offset-col-1">
                <h4>Übersicht der Subkategorie</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kategorie</th>
                        <th>Subkategorie</th>
                        <th>Bild</th>
                        <th>Aktiv</th>
                        <th>Ändern</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subcategories as $subcategory)
                        <tr>
                            <td>{{ $subcategory->id }}</td>
                            <td>
                                @foreach($categories as $category)
                                    @if($category->id === $subcategory->category_id)
                                        {{ $category->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $subcategory->name }}</td>
                            <td>{{ $subcategory->image }}</td>
                            <td>@if($subcategory->active) Ja @else Nein @endif</td>
                            <td>
                                <a href="{{ route('subcategories.adminedit', $subcategory->id) }}">Ändern</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
