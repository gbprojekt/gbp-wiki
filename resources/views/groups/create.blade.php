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
        <div class="row">
            <div class="col-8 offset-col-2">
                <h3 class="text-left col">Gruppe hinzufügen</h3>
                <form action="{{ route('groups.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name</label>
                        <input class="form-control" type="text" value="{{old('name')}}" id="name" name="name"/>
                    </div>
                    <div class="form-group">
                        <label for="slug" class="col-form-label">Slug</label>
                        <input class="form-control" type="text" value="{{old('slug')}}" id="slug" name="slug"/>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <input class="form-control" type="text" value="{{old('description')}}" id="description" name="description"/>
                    </div>
                    <div class="form-group my-4">
                        <p>Wähle die gewünschten Berechtigungen:</p>
                        @foreach($permissions as $permission)
                            <div class="form-check form-check-inline form-switch">
                                <input class="form-check-input" type="checkbox" id="{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}">
                                <label class="form-check-label" for="{{ $permission->name }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
