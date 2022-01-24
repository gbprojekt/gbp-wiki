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
                <h3 class="text-left col">Permissions hinzufügen</h3>
                <form action="{{ route('permissions.store') }}" method="POST">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
