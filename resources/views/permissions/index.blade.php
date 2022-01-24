@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <nav>
                <a href="{{ route('permissions.create') }}">Neue Berechtigung erstellen</a>
            </nav>
        </div>
        @if(Session::has('success'))
            <div class="row">
                <div class="col-8 offset-col-2">
                    <div class="alert alert-success">
                        <p>{{Session::get('success')}}</p>
                    </div>
                </div>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="row">
                <div class="col-8 offset-col-2">
                    <div class="alert alert-danger">
                        <p>{{Session::get('error')}}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-8 offset-col-2">
                <h4>Übersicht der Berechtigungen</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Ändern</th>
                            <th>Löschen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->slug }}</td>
                                <td>{{ $permission->description }}</td>
                                <td>
                                    <a href="{{ route('permissions.edit', $permission->id) }}">Ändern</a>
                                </td>
                                <td>
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
