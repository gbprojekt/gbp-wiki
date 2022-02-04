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
                <a href="{{ route('subcategories.adminindex') }}">Zurück zur Subkategorienübersicht</a>
            </nav>
        </div>
        <div class="row">
            <div class="col-8 offset-col-2">
                <h3 class="text-left col">Subkategorie ändern</h3>
                <form action="{{ route('subcategories.adminupdate', $subcategory->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <p>Wähle die zugehörige Kategorie:</p>
                        @foreach($categories as $category)
                            <div class="form-check form-check-inline form-switch">
                                <input class="form-check-input" type="checkbox" id="{{ $category->id }}" name="categories[]" value="{{ $category->id }}" @if($category->id === $post->category_id) checked @endif>
                                <label class="form-check-label" for="{{ $category->name }}">{{ $category->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name der Subkategorie</label>
                        <input class="form-control" type="text" value="{{ $subcategory->name }}" id="name" name="name"/>
                    </div>
                    <div class="form-group my-4">
                        <p>Aktiv:</p>
                        <label class="form-check-label" for="0">NEIN</label>
                        <div class="form-check form-check-inline form-switch">
                            <input class="form-check-input" type="checkbox" id="active" name="active" value="1" @if($subcategory->active) checked @endif>
                            <label class="form-check-label" for="active">JA</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
