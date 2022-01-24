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
                <h3 class="text-left col">Permissions ändern</h3>
                <form action="{{ route('permissions.update',$permission->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name</label>
                        <input class="form-control" type="text" value="{{ $permission->name }}" id="name" name="name"/>
                    </div>
                    <div class="form-group">
                        <label for="slug" class="col-form-label">Slug</label>
                        <input class="form-control" type="text" value="{{ $permission->slug }}" id="slug" name="slug"/>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <input class="form-control" type="text" value="{{ $permission->description }}" id="description" name="description"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
