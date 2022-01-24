@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-10 offset-col-1 mb-4">
            <nav>
                <a href="{{ route('users.create') }}">Neuen Benutzer erstellen</a>
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
                <h4>Übersicht der User</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Gruppen</th>
                        <th>Berechtigungen (Gruppen)</th>
                        <th>Ändern</th>
                        <th>Löschen</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->groups()->get() as $group)
                                    {{ $group->name }}<br />
                                @endforeach
                            </td>
                            <td>
                                @foreach($permissions as $permission)
                                    @if($user->hasPermissionThroughGroup($permission->id))
                                        {{ $permission->name }}<br />
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}">Ändern</a>
                            </td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
