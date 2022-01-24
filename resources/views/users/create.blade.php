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
                <a href="{{ route('users.index') }}">Zurück zur Benutzerübersicht</a>
            </nav>
        </div>
        <div class="row">
            <div class="col-8 offset-col-2">
                <h3 class="text-left col">Benutzer hinzufügen</h3>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name</label>
                        <input class="form-control" type="text" value="{{old('name')}}" id="name" name="name"/>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">E-Mail</label>
                        <input class="form-control" type="email" value="{{old('email')}}" id="email" name="email"/>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password</label>
                        <input class="form-control" type="password" value="{{old('password')}}" id="password" name="password"/>
                    </div>
                    <div class="form-group my-4">
                        <p>Wähle die zugehörige Gruppe:</p>
                        @foreach($groups as $group)
                            <div class="form-check form-check-inline form-switch">
                                <input class="form-check-input" type="checkbox" id="{{ $group->id }}" name="groups[]" value="{{ $group->id }}">
                                <label class="form-check-label" for="{{ $group->name }}">{{ $group->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
