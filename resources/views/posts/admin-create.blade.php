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
                <a href="{{ route('posts.adminindex') }}">Zurück zur Beitragsübersicht</a>
            </nav>
        </div>
        <div class="row">
            <div class="col-8 offset-col-2">
                <h3 class="text-left col">Beitrag hinzufügen</h3>
                <form action="{{ route('posts.admincreate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <p>Wähle die zugehörige Subkategorie:</p>
                        @foreach($subcategories as $subcategory)
                            <div class="form-check form-check-inline form-switch">
                                <input class="form-check-input" type="checkbox" id="{{ $subcategory->id }}" name="subcategories[]" value="{{ $subcategory->id }}">
                                <label class="form-check-label" for="{{ $subcategory->name }}">{{ $subcategory->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="objectOrder" class="col-form-label">Reihenfolge</label>
                        <input class="form-control" type="numeric" value="{{ old('objectOrder') }}" id="objectOrder" name="objectOrder" />
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Beitragstitel</label>
                        <input class="form-control" type="text" value="{{ old('title') }}" id="title" name="title"/>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-form-label">Beitrag</label>
                        <textarea class="form-control" value="{{ old('content') }}" rows="10" cols="50" name="content"></textarea>
                    </div>
                    <div class="form-group my-4">
                        <input type="file" name="file" class="form-control" />
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
