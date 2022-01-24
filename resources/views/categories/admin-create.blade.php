@extends('layouts.app')

@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row mb-4">
            <nav>
                <a href="{{ route('categories.adminindex') }}">Zurück zur Kategorienübersicht</a>
            </nav>
        </div>
        <div class="row">
            <div class="col-8 offset-col-2">
                <h3 class="text-left col">Kategorie hinzufügen</h3>
                <form action="{{ route('categories.admincreate') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name der Kategorie</label>
                        <input class="form-control" type="text" value="{{old('name')}}" id="name" name="name"/>
                    </div>
                    <div class="form-group my-4">
                        <p>Aktiv:</p>
                        <label class="form-check-label" for="0">NEIN</label>
                        <div class="form-check form-check-inline form-switch">
                            <input class="form-check-input" type="checkbox" id="active" name="active" value="1">
                            <label class="form-check-label" for="active">JA</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
