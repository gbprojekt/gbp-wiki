@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-10 offset-col-1 mb-4">
            <nav>
                <a href="{{ route('categories.admincreate') }}">Neue Kategorie erstellen</a>
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
                <h4>Übersicht der Kategorien</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kategorie</th>
                        <th>Aktiv</th>
                        <th>Ändern</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>@if($category->active) Ja @else Nein @endif</td>
                            <td>
                                <a href="{{ route('categories.adminedit', $category->id) }}">Ändern</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
