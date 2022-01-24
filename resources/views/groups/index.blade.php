@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <nav>
                <a href="{{ route('groups.create') }}">Neue Gruppe erstellen</a>
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
                <h4>Übersicht der Gruppen</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Berechtigungen</th>
                            <th>Ändern</th>
                            <th>Löschen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $group)
                            <tr>
                                <td>{{ $group->id }}</td>
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->slug }}</td>
                                <td>{{ $group->description }}</td>
                                <td>
                                    @foreach($group->permissions()->get() as $permission)
                                        {{ $permission->name }}<br />
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('groups.edit', $group->id) }}">Ändern</a>
                                </td>
                                <td>
                                    <form action="{{ route('groups.destroy', $group->id) }}" method="POST">
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
